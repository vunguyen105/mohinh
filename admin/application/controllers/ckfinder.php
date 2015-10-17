<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Định nghĩa các thư mục/tên của từng loại resource
 */
define('NEWS_IMAGE_FOLDER_NAME', 'Images');
define('NEWS_FLASH_FOLDER_NAME', 'Flashs');
define('NEWS_FILES_FOLDER_NAME', 'Files');

/**
 * Thư mục gốc lưu trữ toàn bộ file upload của user
 */
define('ROOT_FILES_FOLDER', 'media/');

/**
 * @property CI_Output $output 
 */
class Ckfinder extends CI_Controller {
    private $userid = 0;
    private $rootCkPath;

    public function __construct() {
        parent::__construct();
        
        
        /**
         * Gán và xác định userID hoặc username ở đây
         * bạn có thể lấy từ session/db hay bất kỳ đâu tuỳ hệ thống của bạn
         * hoặc bạn có thể định mỗi user/nhóm user có một id riêng => cùng chung thư mục chứa file
         */
        $this->userid = 123; //
        //$this->userid = 'tuan'; //

        
        if (!defined('CKFINDER_ROOT_FOLDER'))
        {
            /*
             * Đánh dấu xác thực cho phép CKFinder được phép chạy.
             * Bạn có thể đưa code kiểm tra phân quyền upload vào đây để xác thực user hiện hành có được phép upload không
             * Nếu user không được quyền upload, bạn define hằng số này = false, thì user có truy cập trực tiếp vào link
             * CFKEditor nó cũng không hoạt động
             */
            define('ALLOW_CKFINDER_FROM_CI', true);
            
            
            /*
             * Không đổi code phần này trừ khi bạn hiểu rõ bạn đang làm gì
             */
            $isQuickUpload = $this->input->get('command') == 'QuickUpload';
            $fileType = $this->input->get('type');
            
            $userPath = ROOT_FILES_FOLDER . $this->userid . '/';
            
            if ($isQuickUpload)
                $userPath .= "$fileType/";
            
            if ($isQuickUpload)
                define ('IS_QUICK_UPLOAD', TRUE);
            else
                define ('IS_QUICK_UPLOAD', FALSE);
            
            define ('CKFINDER_ROOT_FOLDER', $userPath);
        }
        
        $this->rootCkPath = FCPATH . APPPATH . 'third_party/ckfinder/';
        //var_dump($this->rootCkPath);die;
    }

    /**
     * Bắt và xử lý các request tới controller ckfinder. 
     * Do link tới resource của ckfinder rất đa dạng nên không thể viết từng action cho từng
     * resource được mà chỉ viết action cho từng loại chung mà thôi
     * do đó code thay vì viết trong từng action sẽ được xử lý chung qua 1 phương thức
     * duy nhất là _remap
     * 
     */
    public function _remap($method, $params = array()) {
        
        $path = implode ("/", $params);

        if ($method == 'index')
            $method = 'ckfinder.html';        

        if (file_exists($this->rootCkPath . $method) && is_file($this->rootCkPath . $method))
            $path = $method;
        elseif (!file_exists($this->rootCkPath . $path))
            $path = $method . DIRECTORY_SEPARATOR . $path;
        if (file_exists($this->rootCkPath . $path))
        {
            $ext = pathinfo($path, PATHINFO_EXTENSION);
            if ($ext == 'php' || $ext == 'php4' || $ext == 'php5')
            {

                $path = $this->rootCkPath . $path;
                $_SERVER['SCRIPT_FILENAME'] = $path;
                $dirname = dirname($path);
                chdir($dirname);
                require_once $path;
            }
            else//if ($ext == 'html')
            {
                $this->load->helper('file');
                $m = get_mime_by_extension($path);
                
                if (is_array($m))
                    $m = $m[0];
                
                $content = file_get_contents (APPPATH . 'third_party/ckfinder/' . $path);
		$this->output->set_header("Content-type: $m");
                $this->output->append_output($content);
            }
        }
        else
            show_404();
    }    
}
