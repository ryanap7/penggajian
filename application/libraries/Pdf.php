<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
require_once dirname(__FILE__) . '/tcpdf/tcpdf.php';

class Pdf extends TCPDF
{
    function __construct()
    {
        parent::__construct();
    }

    public function Header()
    {
        $this->setJPEGQuality(90);
        $this->SetY(10);
        $table = "<table align=\"center\">
         <tr>
          <td><h1>CV. Tirta Mitra Sejati</h1></td>
         </tr>
         <tr>
         <td>indohomecare@gmail.com</td>
         </tr>
         <tr>
         <td>Jl. A. Yani (Perum Cendrawasih) Gang Baru RT.17 N0. 8</td>
         </tr>
         <tr>
         <td>Samarinda</td>
         </tr>
         <tr>
             <td>+62-8119-777-934</td>
         </tr>
        </table>";
        $this->writeHTML($table, true, false, false, false, '');
        $this->writeHTML("<hr>", true, false, false, false, '');
        $this->SetMargins(10, 50, 10, true);
    }

    public function Footer()
    {
    }
}
