<?php

require('../fpdf/fpdf.php');

class PDF extends FPDF {
// Cabecera de página
    function Header()
    {
        // Logo
        $this->Image('logo.png',20,15,15);
        $this->Image('simbolo.jpg',180,15,15);
        // Arial bold 15
        $this->SetFont('Arial','B',12);
        // Movernos a la derecha
        $this->Cell(80);
        // Título
        $this->Cell(40,10,'Expediente del Trabajador',0,1,'C');
        
        
       $this->Cell(200,5,'Hospital las Cumbres S.A. de C.V.',0,1,'C');
       $this->Cell(200,5,utf8_decode('Robles 110, Las Cumbres, Estado de México'),0,1,'C');
       $this->Ln(10);
// Salto de línea$this->Ln(10);     
    }

    // Pie de página
    function Footer()
    {
        $this->SetY(-25);
        $this->SetFont('Arial','I',8);
        $this->Cell(190, 10, 'Este documento solo puede ser generado por el trabajador del hospital, bajo ninguna circustancia este documento debe ser publico', 1, 1, 'C');
        // Posición: a 1,5 cm del final
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial','I',8);
        // Número de página
        $this->Cell(0,10,'Pagina '.$this->PageNo().'/{nb}',0,0,'C');
    }
}
    session_start();    
    $varSesion = $_SESSION['usuario'];
    include '../conexion.php';

    $consulta = "SELECT * FROM personalMedico WHERE correo = '$varSesion'";
    $resultado = mysqli_query($conexion, $consulta);
   
// Creación del objeto de la clase heredada
    $pdf = new PDF();
    $pdf->AliasNbPages();
    $pdf->AddPage();
    $pdf->SetFont('Times','',11); 
    
    $pdf->Cell(190, 10, 'Datos del Personal Medico', 1, 1, 'C');

    while ($row = $resultado->fetch_assoc() ){
        $pdf->Cell(50, 10, 'Identificador: THC-'. $row['id'], 1, 1, 'C');
        $pdf->Cell(190, 10, 'Correo Electronico: '.$row['correo'], 1, 1, 'C');
        $pdf->Cell(63, 10, 'Nombre(s): '.$row['nombre'], 1, 0, 'I');
        $pdf->Cell(63, 10, 'Apellido Paterno: '.$row['apellidoP'], 1, 0, 'L');
        $pdf->Cell(63, 10, 'Apellido Materno: '.$row['apellidoM'], 1, 1, 'L');
        $pdf->Cell(90, 10, 'Tipo de Personal: '.$row['tipoPersonal'], 1, 1, 'L');
        $pdf->Cell(190, 10, 'Direccion: '.$row['direccion'], 1, 1, 'L');
        $pdf->Cell(90, 10, 'Codigo Postal: '.$row['cp'], 1, 1, 'L');
        $pdf->Cell(90, 10, 'Telefono: '.$row['telefono'], 1, 1, 'L');
        $pdf->Cell(90, 10, 'CURP: '.$row['curp'], 1, 1, 'L');
        $pdf->Cell(90, 10, 'RFC: '.$row['rfc'], 1, 1, 'L');
        $pdf->Cell(90, 10, 'Area a la que pertenece: '.$row['area'], 1, 1, 'L');     
    }
    $pdf->Ln(10);
    $pdf->SetFont('Times','',8);
    $pdf->Cell(190, 10, 'Este documento solo puede ser generado por el trabajador del hospital, bajo ninguna circustancia este documento debe ser publico', 1, 1, 'C');

    ob_end_clean();
    $pdf->Output();
?>