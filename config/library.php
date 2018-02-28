<?php

	// Function that put a time 
	function getDateFrFormat($date)
	{
		$date = explode('-', $date);
		return $date[2].'/'.$date[1].'/'.$date[0];
	}


	class PDF extends FPDF
	{
		private $project;
		// Page header
		function Header()
		{
		    // Logo
		    $this->Image("http://".ROOT_DIR."resources/images/logo_assi.png",10,6,30);
		    // Arial bold 15
		    $this->SetFont('Arial','B',15);
		    // Move to the right
		    $this->Cell(80);
		    // Title
		    $this->Cell(30,10,'Fiche Projet '.$this->project->getCode(),0,0,'C');
		    // Line break
		    $this->Ln(20);
		}

		// Page footer
		function Footer()
		{
		    // Position at 1.5 cm from bottom
		    $this->SetY(-15);
		    // Arial italic 8
		    $this->SetFont('Arial','I',8);
		    // Page number
		    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
		}

		function setProject(Projet $project){
			$this->project = $project;
		}

		function printDetailsTable($header, $data)
		{
		    // Colors, line width and bold font
		    $this->SetFillColor(255,255,0);
		    $this->SetTextColor(0);
		    $this->SetDrawColor(128,0,0);
		    $this->SetLineWidth(.3);
		    $this->SetFont('','B');
		    // Header
		    $w = array(70, 70, 65, 65);
		    for($i=0;$i<count($header);$i++)
		        $this->Cell($w[$i],7,$header[$i],1,0,'C',true);
		    $this->Ln();
		    // Color and font restoration
		    $this->SetFillColor(224,235,255);
		    $this->SetTextColor(0);
		    //$this->SetFont('');
		    // Data
		    $fill = false;
		    foreach($data as $row)
		    {
		        $this->Cell($w[0],6,$row[0],'LR',0,'L',$fill);
		        $this->Cell($w[1],6,$row[1],'LR',0,'L',$fill);
		        $this->Cell($w[2],6,$row[2],'LR',0,'L',$fill);
		        $this->Cell($w[3],6,$row[3],'LR',0,'L',$fill);
		        $this->Ln();
		        $fill = !$fill;
		    }
		    // Closing line
		    $this->Cell(array_sum($w),0,'','T');

		    $this->Ln();
		}

		function printTasksTable($header, $data)
		{
		    // Colors, line width and bold font
		    $this->SetFillColor(0,0,200);
		    $this->SetTextColor(255);
		    $this->SetDrawColor(128,0,0);
		    $this->SetLineWidth(.3);
		    $this->SetFont('','B');
		    // Header
		    $w = array(100, 90, 80);
		    for($i=0;$i<count($header);$i++)
		        $this->Cell($w[$i],7,$header[$i],1,0,'C',true);
		    $this->Ln();
		    // Color and font restoration
		    $this->SetFillColor(224,235,255);
		    $this->SetTextColor(0);
		    $this->SetFont('');
		    // Data
		    $fill = false;
		    foreach($data as $row)
		    {
		        $this->Cell($w[0],6,$row[0],1,0,'L',$fill);
		        $this->Cell($w[1],6,$row[1],1,0,'L',$fill);
		        $this->Cell($w[2],6,$row[2],1,0,'R',$fill);
		        $this->Ln();
		        $fill = !$fill;
		    }
		    // Closing line
		    //$this->Cell(array_sum($w),0,'','T');
		}
	}

	class ProjectsPDF extends FPDF
	{
		// Page header
		function Header()
		{
		    // Logo
		    $this->Image("http://".ROOT_DIR."resources/images/logo_assi.png",10,6,30);
		    // Arial bold 15
		    $this->SetFont('Arial','B',15);
		    // Move to the right
		    $this->Cell(80);
		    // Title
		    $this->Cell(50,10,'e-Projet ',0,0,'C');
		    // Line break
		    $this->Ln(20);
		}

		// Page footer
		function Footer()
		{
		    // Position at 1.5 cm from bottom
		    $this->SetY(-15);
		    // Arial italic 8
		    $this->SetFont('Arial','I',8);
		    // Page number
		    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
		}

		function displayProjectsTable($header, $data)
		{
		    // Colors, line width and bold font
		    $this->SetFillColor(0,0,200);
		    $this->SetTextColor(255);
		    $this->SetDrawColor(128,0,0);
		    $this->SetLineWidth(.3);
		    $this->SetFont('','B');
		    // Header
		    $w = array(20, 40, 40, 40, 50);
		    for($i=0;$i<count($header);$i++)
		        $this->Cell($w[$i],7,$header[$i],1,0,'C',true);
		    $this->Ln();
		    // Color and font restoration
		    $this->SetFillColor(224,235,255);
		    $this->SetTextColor(0);
		    $this->SetFont('');
		    // Data
		    $fill = false;
		    foreach($data as $row)
		    {
		        $this->Cell($w[0],6,$row[0],'LR',0,'L',$fill);
		        $this->Cell($w[1],6,$row[1],'LR',0,'L',$fill);
		        $this->Cell($w[2],6,$row[2],'LR',0,'R',$fill);
		        $this->Cell($w[3],6,$row[3],'LR',0,'R',$fill);
		        $this->Cell($w[4],6,$row[4],'LR',0,'R',$fill);
		        $this->Ln();
		        $fill = !$fill;
		    }
		    // Closing line
		    $this->Cell(array_sum($w),0,'','T');
		}
	}


	class PDF_Sector extends FPDF
	{
	    function Sector($xc, $yc, $r, $a, $b, $style='FD', $cw=true, $o=90)
	    {
	        $d0 = $a - $b;
	        if($cw){
	            $d = $b;
	            $b = $o - $a;
	            $a = $o - $d;
	        }else{
	            $b += $o;
	            $a += $o;
	        }
	        while($a<0)
	            $a += 360;
	        while($a>360)
	            $a -= 360;
	        while($b<0)
	            $b += 360;
	        while($b>360)
	            $b -= 360;
	        if ($a > $b)
	            $b += 360;
	        $b = $b/360*2*M_PI;
	        $a = $a/360*2*M_PI;
	        $d = $b - $a;
	        if ($d == 0 && $d0 != 0)
	            $d = 2*M_PI;
	        $k = $this->k;
	        $hp = $this->h;
	        if (sin($d/2))
	            $MyArc = 4/3*(1-cos($d/2))/sin($d/2)*$r;
	        else
	            $MyArc = 0;
	        //first put the center
	        $this->_out(sprintf('%.2F %.2F m',($xc)*$k,($hp-$yc)*$k));
	        //put the first point
	        $this->_out(sprintf('%.2F %.2F l',($xc+$r*cos($a))*$k,(($hp-($yc-$r*sin($a)))*$k)));
	        //draw the arc
	        if ($d < M_PI/2){
	            $this->_Arc($xc+$r*cos($a)+$MyArc*cos(M_PI/2+$a),
	                        $yc-$r*sin($a)-$MyArc*sin(M_PI/2+$a),
	                        $xc+$r*cos($b)+$MyArc*cos($b-M_PI/2),
	                        $yc-$r*sin($b)-$MyArc*sin($b-M_PI/2),
	                        $xc+$r*cos($b),
	                        $yc-$r*sin($b)
	                        );
	        }else{
	            $b = $a + $d/4;
	            $MyArc = 4/3*(1-cos($d/8))/sin($d/8)*$r;
	            $this->_Arc($xc+$r*cos($a)+$MyArc*cos(M_PI/2+$a),
	                        $yc-$r*sin($a)-$MyArc*sin(M_PI/2+$a),
	                        $xc+$r*cos($b)+$MyArc*cos($b-M_PI/2),
	                        $yc-$r*sin($b)-$MyArc*sin($b-M_PI/2),
	                        $xc+$r*cos($b),
	                        $yc-$r*sin($b)
	                        );
	            $a = $b;
	            $b = $a + $d/4;
	            $this->_Arc($xc+$r*cos($a)+$MyArc*cos(M_PI/2+$a),
	                        $yc-$r*sin($a)-$MyArc*sin(M_PI/2+$a),
	                        $xc+$r*cos($b)+$MyArc*cos($b-M_PI/2),
	                        $yc-$r*sin($b)-$MyArc*sin($b-M_PI/2),
	                        $xc+$r*cos($b),
	                        $yc-$r*sin($b)
	                        );
	            $a = $b;
	            $b = $a + $d/4;
	            $this->_Arc($xc+$r*cos($a)+$MyArc*cos(M_PI/2+$a),
	                        $yc-$r*sin($a)-$MyArc*sin(M_PI/2+$a),
	                        $xc+$r*cos($b)+$MyArc*cos($b-M_PI/2),
	                        $yc-$r*sin($b)-$MyArc*sin($b-M_PI/2),
	                        $xc+$r*cos($b),
	                        $yc-$r*sin($b)
	                        );
	            $a = $b;
	            $b = $a + $d/4;
	            $this->_Arc($xc+$r*cos($a)+$MyArc*cos(M_PI/2+$a),
	                        $yc-$r*sin($a)-$MyArc*sin(M_PI/2+$a),
	                        $xc+$r*cos($b)+$MyArc*cos($b-M_PI/2),
	                        $yc-$r*sin($b)-$MyArc*sin($b-M_PI/2),
	                        $xc+$r*cos($b),
	                        $yc-$r*sin($b)
	                        );
	        }
	        //terminate drawing
	        if($style=='F')
	            $op='f';
	        elseif($style=='FD' || $style=='DF')
	            $op='b';
	        else
	            $op='s';
	        $this->_out($op);
	    }

	    function _Arc($x1, $y1, $x2, $y2, $x3, $y3 )
	    {
	        $h = $this->h;
	        $this->_out(sprintf('%.2F %.2F %.2F %.2F %.2F %.2F c',
	            $x1*$this->k,
	            ($h-$y1)*$this->k,
	            $x2*$this->k,
	            ($h-$y2)*$this->k,
	            $x3*$this->k,
	            ($h-$y3)*$this->k));
	    }
	}
	

	class PDF_Diag extends PDF_Sector {
	    var $legends;
	    var $wLegend;
	    var $sum;
	    var $NbVal;

	    // Page header
		function Header()
		{
		    // Logo
		    $this->Image("http://".ROOT_DIR."resources/images/logo_assi.png",10,6,30);
		    // Arial bold 15
		    $this->SetFont('Arial','B',15);
		    // Move to the right
		    $this->Cell(80);
		    // Title
		    $this->Cell(50,10,'e-Projet ',0,0,'C');
		    // Line break
		    $this->Ln(20);
		}

	    function PieChart($w, $h, $data, $format, $colors=null)
	    {
	        $this->SetFont('Courier', '', 10);
	        $this->SetLegends($data,$format);

	        $XPage = $this->GetX();
	        $YPage = $this->GetY();
	        $margin = 2;
	        $hLegend = 5;
	        $radius = min($w - $margin * 4 - $hLegend - $this->wLegend, $h - $margin * 2);
	        $radius = floor($radius / 2);
	        $XDiag = $XPage + $margin + $radius;
	        $YDiag = $YPage + $margin + $radius;
	        if($colors == null) {
	            for($i = 0; $i < $this->NbVal; $i++) {
	                $gray = $i * intval(255 / $this->NbVal);
	                $colors[$i] = array($gray,$gray,$gray);
	            }
	        }

	        //Sectors
	        $this->SetLineWidth(0.2);
	        $angleStart = 0;
	        $angleEnd = 0;
	        $i = 0;
	        foreach($data as $val) {
	            $angle = ($val * 360) / doubleval($this->sum);
	            if ($angle != 0) {
	                $angleEnd = $angleStart + $angle;
	                $this->SetFillColor($colors[$i][0],$colors[$i][1],$colors[$i][2]);
	                $this->Sector($XDiag, $YDiag, $radius, $angleStart, $angleEnd);
	                $angleStart += $angle;
	            }
	            $i++;
	        }

	        //Legends
	        $this->SetFont('Courier', '', 10);
	        $x1 = $XPage + 2 * $radius + 4 * $margin;
	        $x2 = $x1 + $hLegend + $margin;
	        $y1 = $YDiag - $radius + (2 * $radius - $this->NbVal*($hLegend + $margin)) / 2;
	        for($i=0; $i<$this->NbVal; $i++) {
	            $this->SetFillColor($colors[$i][0],$colors[$i][1],$colors[$i][2]);
	            $this->Rect($x1, $y1, $hLegend, $hLegend, 'DF');
	            $this->SetXY($x2,$y1);
	            $this->Cell(0,$hLegend,$this->legends[$i]);
	            $y1+=$hLegend + $margin;
	        }
	    }

	    function BarDiagram($w, $h, $data, $format, $color=null, $maxVal=0, $nbDiv=100)
	    {

	        $this->SetFont('Courier', '', 10);
	        $this->SetLegends($data,$format);

	        $XPage = $this->GetX();
	        $YPage = $this->GetY();
	        $margin = 2;
	        $YDiag = $YPage + $margin;
	        $hDiag = floor($h - $margin * 2);
	        $XDiag = $XPage + $margin * 2 + $this->wLegend;
	        $lDiag = floor($w - $margin * 3 - $this->wLegend);
	        if($color == null)
	            $color=array(155,155,155);
	        if ($maxVal == 0) {
	            $maxVal = max($data);
	            if ($maxVal == 0)
	            	$maxVal = 100;
	        }
	        $valIndRepere = ceil($maxVal / $nbDiv);
	        $maxVal = $valIndRepere * $nbDiv;
	        $lRepere = floor($lDiag / $nbDiv);
	        $lDiag = $lRepere * $nbDiv;
	        $unit = $lDiag / $maxVal;
	        $hBar = floor($hDiag / ($this->NbVal + 1));
	        $hDiag = $hBar * ($this->NbVal + 1);
	        $eBaton = floor($hBar * 80 / 100);

	        $this->SetLineWidth(0.2);
	        $this->Rect($XDiag, $YDiag, $lDiag, $hDiag);

	        $this->SetFont('Courier', '', 10);
	        $this->SetFillColor($color[0],$color[1],$color[2]);
	        $i=0;
	        foreach($data as $val) {
	            //Bar
	            $xval = $XDiag;
	            $lval = (int)($val * $unit);
	            $yval = $YDiag + ($i + 1) * $hBar - $eBaton / 2;
	            $hval = $eBaton;
	            $this->Rect($xval, $yval, $lval, $hval, 'DF');
	            //Legend
	            $this->SetXY(0, $yval);
	            $this->Cell($xval - $margin, $hval, $this->legends[$i],0,0,'R');
	            $i++;
	        }

	        //Scales
	        
	        for ($i = 0; $i <= $nbDiv; $i++) {
	            $xpos = $XDiag + $lRepere * $i;
	            if ($i % 10 == 0)
	            	$this->Line($xpos, $YDiag, $xpos, $YDiag + $hDiag);
	            $val = $i * $valIndRepere;
	            $xpos = $XDiag + $lRepere * $i - $this->GetStringWidth($val) / 2;
	            $ypos = $YDiag + $hDiag - $margin;
	            if ($i % 10 == 0)
	            	$this->Text($xpos, $ypos, $val);
	        }
	        
	    }

	    function SetLegends($data, $format)
	    {
	        $this->legends=array();
	        $this->wLegend=0;
	        $this->sum=array_sum($data);
	        $this->NbVal=count($data);
	        foreach($data as $l=>$val)
	        {
	            //$p=sprintf('%.2f',$val/$this->sum*100).'%';
	            $p=sprintf('%.2f',$val).'%';
	            $legend=str_replace(array('%l','%v','%p'),array($l,$val,$p),$format);
	            $this->legends[]=$legend;
	            $this->wLegend=max($this->GetStringWidth($legend),$this->wLegend);
	        }
	    }
	}

