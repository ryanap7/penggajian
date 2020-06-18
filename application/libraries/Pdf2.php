<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
require_once dirname(__FILE__) . '/tcpdf/tcpdf.php';

class Pdf2 extends TCPDF
{
    function __construct()
    {
        parent::__construct();
    }

    public function Header()
    {

        $this->SetY(15);
        $table = "<table align=\"center\">
        <tr>
            <td><h1>Laporan Absensi</h1></td>
        </tr>
        <tr>
            <td><strong>CV. Tirta Mitra Sejati</strong></td>
        </tr>
        </table>";
        $this->writeHTML($table, true, false, false, false, '');
        $this->writeHTML("<hr>", true, false, false, false, '');
        $this->SetMargins(10, 30, 10, true);
    }

    public function Footer()
    {
    }
}
