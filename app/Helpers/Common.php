<?php

namespace App\Helpers;

use Image;

class Common {

    /**
     * truncate a string provided by the maximum limit without breaking a word
     * @author Dhaval Bharadva
     * @param string $str
     * @param integer $maxlen
     * @return string
     */
    public static function shorteningString($str, $maxlen) {
        if (strlen($str) <= $maxlen)
            return $str;
        $newstr = substr($str, 0, $maxlen);
        if (substr($newstr, -1, 1) != ' ')
            $newstr = substr($newstr, 0, strrpos($newstr, " "));
        return $newstr . ' ...';
    }

    /**
     * apply base64 first and then reverse the string
     * @author Dhaval Bharadva
     * @param string $str
     * @return endcoded string
     */
    public static function encode5t($str) {
        for ($i = 0; $i < 6; $i++) {
            $str = strrev(base64_encode($str));
        }
        return $str;
    }

    /**
     * reverse the string first and then apply base64
     * @author Dhaval Bharadva
     * @param string $str
     * @return decoded string
     */
    public static function decode5t($str) {
        for ($i = 0; $i < 6; $i++) {
            $str = base64_decode(strrev($str));
        }
        return $str;
    }

    /**
     * generate random string by given length
     * @author Dhaval Bharadva
     * @param string $length
     * @return string
     */
    public static function generateRandomString($length = 10) {

        return strtoupper(substr(str_shuffle(MD5(microtime())), 0, $length));

        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, strlen($characters) - 1)];
        }
        return $randomString;
    }

    /* author: Dhaval Bharadva
     * description: upload image to folder
     * return: filename if uploaded false otherwise
     */

    public static function upload_image($field_name, $uploadTo, $filename = '') {
        if (isset($_FILES[$field_name]) && $_FILES[$field_name]['name'] != "") {
            $filenameOrg = $_FILES[$field_name]['name'];
            $extArray = explode('.', $filenameOrg);
            $ext = end($extArray);
            //$filename = date('YmdHis') . uniqid() . '.' . $ext;
            if ($filename == "") {
                $filename = self::generateRandomString() . '.' . $ext;
            } else {
                $filename = $filename . '.' . $ext;
            }
            $target_image = $uploadTo . $filename;
            chmod($uploadTo, 0777);
            $uploadimage = move_uploaded_file($_FILES[$field_name]['tmp_name'], $target_image);
            if ($uploadimage) {
                return $filename;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public static function priceFormatDecimal($price) {
        return number_format($price, 2, '.', ',');
    }

    public static function priceFormatNoDecimal($price) {
        return number_format($price, 0, '.', ',');
    }

    

    /**
     * check credit card expire month year
     * @author Dhaval Bharadva
     * @param string $month $year
     * @return boolean
     */
    public static function check_exp_date($month, $year) {
        /* Get timestamp of midnight on day after expiration month. */
        $exp_ts = mktime(0, 0, 0, $month + 1, 1, $year);
        $cur_ts = time();
        /* Don't validate for dates more than 10 years in future. */
        $max_ts = $cur_ts + (10 * 365 * 24 * 60 * 60);

        if ($exp_ts > $cur_ts && $exp_ts < $max_ts) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Format phone number to us format
     * @author Dhaval Bharadva
     * @param string $phone
     * @return $phone with format
     */
    public static function format_phone_us($phone) {
        // note: making sure we have something
        if (!isset($phone{3})) {
            return '';
        }
        // note: strip out everything but numbers 
        $phone = preg_replace("/[^0-9]/", "", $phone);
        $length = strlen($phone);
        switch ($length) {
            case 7:
                return preg_replace("/([0-9]{3})([0-9]{4})/", "$1-$2", $phone);
                break;
            case 10:
                return preg_replace("/([0-9]{3})([0-9]{3})([0-9]{4})/", "$1-$2-$3", $phone);
                break;
            case 11:
                return preg_replace("/([0-9]{1})([0-9]{3})([0-9]{3})([0-9]{4})/", "$1($2) $3-$4", $phone);
                break;
            default:
                return $phone;
                break;
        }
    }

    /**
     * Add http to url if not found
     * @author Dhaval Bharadva
     * @param string $url
     * @return url with http or https
     */
    public static function addScheme($url, $scheme = 'http://') {
        return parse_url($url, PHP_URL_SCHEME) === null ? $scheme . $url : $url;
    }

    /**
     * Add www to url if not found
     * @author Dhaval Bharadva
     * @param string $url
     * @return url with www
     */
    public static function addWWW($url, $search = '://', $insert = 'www.') {
        $index = strpos($url, $search);
        if ($index === false) {
            return $url;
        }
        if (strpos($url, $insert) == false) {
            return substr_replace($url, $search . $insert, $index, strlen($search));
        } else {
            return $url;
        }
    }

    /**
     * Add slash at end of url
     * @author Dhaval Bharadva
     * @param string $url
     * @return url with slash at end of url
     */
    public static function addTrailSlash($url) {
        if (SUBSTR($url, -1) != '/') {
            return $url.= '/';
        } else {
            return $url;
        }
    }

    /**
     * To make a directory
     * @path as string, @permission as string 
     * @access public
     */
    public static function makeDirectory($path, $permission = 0777) {
        if (!is_dir($path)){
            mkdir($path);
            chmod($path, $permission);
        }
    }

    //to remove the directory
    public static function rmdirectory($path) {
        $dir = opendir($path);
        while ($entry = readdir($dir)) {
            if (is_file("$path/$entry")) {
                unlink($path . '/' . $entry);
            } elseif (is_dir("$path/$entry") && $entry != '.' && $entry != '..') {
                self::rmdirectory("$path/$entry");
            }
        }
        closedir($dir);
        return rmdir($path);
    }

    /**
     * Get slug of string
     * 
     * @access public
     * @author HARDEEP PANDYA (Dhaval Bharadva)
     * @param $text (string)
     * @param $append (string) string to append
     * @return string
     * 
     */
    public static function getSlug($text, $append = '') {
        // replace all non letters by _
        $text = preg_replace('/\W+/', '-', $text);

        // trim and lowercase
        $text = strtolower(trim($text, '-'));

        $text = $text . $append;

        return $text;
    }

    /**
     * Create thumbnail of image and upload to specified folder.
     * 
     * @author Dhaval
     * @param  string $sourceFile, string $destinationFile, int $width, int $height
     * @return Boolean true
     */
    public static function createThumb($sourceFile, $destinationFile, $width, $height) {
        // create new image with transparent background color
        $background = Image::canvas($width, $height);
        // read image file and resize it
        // but keep aspect-ratio and do not size up,
        // so smaller sizes don't stretch
        $image = Image::make($sourceFile)->resize($width, $height, function ($c) {
            $c->aspectRatio();
            $c->upsize();
        });
        // insert resized image centered into background
        $background->insert($image, 'center');
        // save
        $background->save($destinationFile);
        return true;
    }

    /**
     * Add watermark to image
     * @param $source_img & $dest_img
     * @return image with watermark
     * @access public
     * @author Dhaval Bharadva
     */
    public static function image_watermark($source_img, $dest_img) {
        // Load the stamp and the photo to apply the watermark to
        $logo = PROPERTY_IMAGE_PATH . '/logo.png';
        $stamp = imagecreatefrompng($logo);
        list($source_width, $source_height, $source_type) = getimagesize($source_img);
        switch ($source_type) {
            case IMAGETYPE_GIF:
                $im = imagecreatefromgif($source_img);
                break;
            case IMAGETYPE_JPEG:
                $im = imagecreatefromjpeg($source_img);
                break;
            case IMAGETYPE_PNG:
                $im = imagecreatefrompng($source_img);
                break;
        }

        // Set the margins for the stamp and get the height/width of the stamp image
        $marge_right = 10;
        $marge_bottom = 10;
        $sx = imagesx($stamp);
        $sy = imagesy($stamp);

        $imgx = imagesx($im);
        $imgy = imagesy($im);

        $centerX = ($imgx / 2) - ($sx / 2); // For centering the watermark on any image
        $centerY = ($imgy / 2) - ($sy / 2); // For centering the watermark on any image
        // Copy the stamp image onto our photo using the margin offsets and the photo 
        // width to calculate positioning of the stamp.
        imagecopy($im, $stamp, $centerX, $centerY, 0, 0, imagesx($stamp), imagesy($stamp));

        // Output and free memory
        //header('Content-type: image/png');
        switch ($source_type) {
            case IMAGETYPE_GIF:
                imagegif($im, $dest_img);
                break;
            case IMAGETYPE_JPEG:
                imagejpeg($im, $dest_img);
                break;
            case IMAGETYPE_PNG:
                imagepng($im, $dest_img);
                break;
        }
        imagedestroy($im);
        return true;
    }

    /**
     * Roate image clockwise
     * 
     * @param string $file
     * @param string $fileThumb
     * @param string $$fileOrg
     * @return boolean
     * @access public
     * @author Dhaval Bharadva
     */
    public static function image_rotate($file, $fileThumb, $fileOrg) {

        $degrees = -90;

        //main image
        list($width, $height, $type, $attr) = getimagesize($file);
        if ($type == IMAGETYPE_JPEG) {
            $source = imagecreatefromjpeg($file);
        } elseif ($type == IMAGETYPE_PNG) {
            $source = imagecreatefrompng($file);
        }
        $rotate = imagerotate($source, $degrees, 0);
        if ($type == IMAGETYPE_JPEG) {
            imagejpeg($rotate, $file);
        } elseif ($type == IMAGETYPE_PNG) {
            imagepng($rotate, $file);
        }
        imagedestroy($source);
        imagedestroy($rotate);

        //thumbnail
        list($width, $height, $type, $attr) = getimagesize($fileThumb);
        if ($type == IMAGETYPE_JPEG) {
            $sourceThumb = imagecreatefromjpeg($fileThumb);
        } elseif ($type == IMAGETYPE_PNG) {
            $sourceThumb = imagecreatefrompng($fileThumb);
        }
        $rotateThumb = imagerotate($sourceThumb, $degrees, 0);
        if ($type == IMAGETYPE_JPEG) {
            imagejpeg($rotateThumb, $fileThumb);
        } elseif ($type == IMAGETYPE_PNG) {
            imagepng($rotateThumb, $fileThumb);
        }
        imagedestroy($sourceThumb);
        imagedestroy($rotateThumb);

        //original
        list($width, $height, $type, $attr) = getimagesize($file);
        if ($type == IMAGETYPE_JPEG) {
            $sourceOrg = imagecreatefromjpeg($fileOrg);
        } elseif ($type == IMAGETYPE_PNG) {
            $sourceOrg = imagecreatefrompng($fileOrg);
        }
        $rotateOrg = imagerotate($sourceOrg, $degrees, 0);
        if ($type == IMAGETYPE_JPEG) {
            imagejpeg($rotateOrg, $fileOrg);
        } elseif ($type == IMAGETYPE_PNG) {
            imagepng($rotateOrg, $fileOrg);
        }
        imagedestroy($sourceOrg);
        imagedestroy($rotateOrg);

        return true;
    }

    /**
     * remove all whitespace from string
     * @param $string
     * @return $string without whitespace
     * @access public
     * @author Dhaval Bharadva
     */
    public static function removeSpace($string) {
        return preg_replace('/\s+/', '', $string);
    }

    /**
     * copy all directories recursively from source to destination
     * @param $source folder path
     * @param $destination folder path
     * @return true
     * @access public
     * @author Dhaval Bharadva
     */
    public static function copyRecursive($src, $dst) {
        if (!file_exists($src)) {
            return true;
        }
        $dir = opendir($src);
        @mkdir($dst);
        chmod($dst, 0777);
        while (false !== ( $file = readdir($dir))) {
            if ($file != '.' && $file != '..') {
                if (is_dir($src . '/' . $file)) {
                    self::copyRecursive($src . '/' . $file, $dst . '/' . $file);
                } else {
                    copy($src . '/' . $file, $dst . '/' . $file);
                }
            }
        }
        closedir($dir);
        return true;
    }
    
    /**
     * Send sms from click a tell
     * @param $url (string)
     * @return boolean
     * @access public
     * @author Dhaval Bharadva
     */
    public static function sendSms($url) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); //Set curl to return the data instead of printing it to the browser.
        $data = curl_exec($ch);
        curl_close($ch);
        return $data;
    }
    
    /**
     * Convert array to object
     * @param $array
     * @return $obj
     * @access public
     * @author Dhaval Bharadva
     */
    function arrayToObject($array) {
        if (is_array($array)) {
            /*
            * Return array converted to object
            * Using __FUNCTION__ (Magic constant)
            * for recursive call
            */
            return (object) array_map(__FUNCTION__, $array);
        }
        else {
            // Return object
            return $array;
        }
    }

}

?>
