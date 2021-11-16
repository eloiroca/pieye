<?php
//Controlador per gestionar funcions que shan de repetir

defined('BASEPATH') OR exit('No direct script access allowed');

class Cron extends CI_Controller {
  public function __construct(){
      parent::__construct();
  }

  public function index(){
      //Si esta loggejat carregarem la intranet
      if($this->ion_auth->logged_in() ){

      }else{redirect('auth/login', 'refresh');}
  }

  public function executeCron(){
      //Inici del Cron

      /***GESTIO CAMARES****/
      $this->save_in_log('--TASK GESTIO CAMARES---');
      $this->save_in_log('Revisant si shan deliminar carpetes de les cameres');
      $count_delete_folder = $this->emptyCamFolders(100);
      if ($count_delete_folder!=0) {
        $this->save_in_log('Shan buidat '.$count_delete_folder.' carpetes de les cameres de fa 1 mes');
      }


  }

  public function save_in_log($log_comment){
        $path_log = $_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . 'assets' . DIRECTORY_SEPARATOR . 'logs';
        if(strpos($_SERVER['HTTP_HOST'], "localhost")) {
            $path_log = 'C:\Xampps\Xamp7.4.1\htdocs\localhost\finder4parts\public\log';
        }

        $log  = "[".date("Y-m-d H:i:s")."] CronRaspberrylineLog.INFO: ".$log_comment;

        file_put_contents($path_log.DIRECTORY_SEPARATOR.'LogCronRaspberry.log', $log. "\n", FILE_APPEND);
    }

    public function emptyCamFolders($numFoldersToDelete){
        $pathCamFolder='/var/www/xiaomi_camera_videos';
        $dir = scandir($pathCamFolder);
        $count_delete_folder = 0;

        foreach ($dir as $key => $dir_cam) {
            if($dir_cam=='.' || $dir_cam=='..'){
                continue;
            }
            $dir_cam_to_empty = scandir($pathCamFolder.DIRECTORY_SEPARATOR.$dir_cam.DIRECTORY_SEPARATOR);
            if(count($dir_cam_to_empty)>2){
              //Carpetes de cada camara que elimninarem
              foreach ($dir_cam_to_empty as $key_dir => $dir_cam_to_empty_path) {
                  if($dir_cam_to_empty_path=='.' || $dir_cam_to_empty_path=='..'){
                      continue;
                  }
                  //Borrarem nomes les carpetes que fa més de 1 més que hi son
                  if ($key_dir-2<$numFoldersToDelete) {
                    $path_folder_to_delete = $pathCamFolder.DIRECTORY_SEPARATOR.$dir_cam.DIRECTORY_SEPARATOR.$dir_cam_to_empty_path.DIRECTORY_SEPARATOR;
                    $today = date("d-m-Y H:i:00");
                    $month_ago = date("d-m-Y H:i:00",strtotime($today."- 1 month"));
                    $date_folder_to_delete = date ("d-m-Y H:i:00", filemtime($path_folder_to_delete));

                    if($date_folder_to_delete<$month_ago){
                        $this->rrmdir($pathCamFolder.DIRECTORY_SEPARATOR.$dir_cam.DIRECTORY_SEPARATOR.$dir_cam_to_empty_path.DIRECTORY_SEPARATOR);
                        $count_delete_folder++;
                    }

                  }
              }
            }
        }
        return $count_delete_folder;
    }

    //Funcio que elimina subdirectoris i directoris
    public function rrmdir($src) {
        $dir = opendir($src);
        while(false !== ( $file = readdir($dir)) ) {
            if (( $file != '.' ) && ( $file != '..' )) {
                $full = $src . '/' . $file;
                if ( is_dir($full) ) {
                    $this->rrmdir($full);
                }
                else {
                    unlink($full);
                }
            }
        }
        closedir($dir);
        rmdir($src);
    }

}
