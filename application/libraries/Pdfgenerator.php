<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * CodeIgniter PDF Library
 *
 * Generate PDF in CodeIgniter applications.
 *
 * @package            CodeIgniter
 * @subpackage        Libraries
 * @category        Libraries
 * @author            CodexWorld
 * @license            https://www.codexworld.com/license/
 * @link            https://www.codexworld.com
 */

// reference the Dompdf namespace
use Dompdf\Dompdf;

class Pdfgenerator
{
    public function __construct(){

        // include autoloader
        require_once dirname(__FILE__).'/dompdf/autoload.inc.php';

        // instantiate and use the dompdf class
        $pdf = new DOMPDF();
        $pdf->set_option('enable_html5_parser', TRUE);

        $CI =& get_instance();
        $CI->dompdf = $pdf;

    }
}
?>
