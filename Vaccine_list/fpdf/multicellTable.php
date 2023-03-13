<?php
include './fpdf/fpdf.php';

class PDF_MC_Table extends FPDF
{
    protected $widths;
    protected $aligns;

    function WriteText($text)
    {
        $intPosIni = 0;
        $intPosFim = 0;
        if (strpos($text,'<')!==false && strpos($text,'[')!==false)
        {
            if (strpos($text,'<')<strpos($text,'['))
            {
                $this->Write(6,substr($text,0,strpos($text,'<')));
                $intPosIni = strpos($text,'<');
                $intPosFim = strpos($text,'>');
                $this->SetFont('','B');
                $this->Write(6,substr($text,$intPosIni+1,$intPosFim-$intPosIni-1));
                $this->SetFont('','');
                $this->WriteText(substr($text,$intPosFim+1,strlen($text)));
            }
            else
            {
                $this->Write(6,substr($text,0,strpos($text,'[')));
                $intPosIni = strpos($text,'[');
                $intPosFim = strpos($text,']');
                $w=$this->GetStringWidth('a')*($intPosFim-$intPosIni-1);
                $this->Cell($w,$this->FontSize+0.75,substr($text,$intPosIni+1,$intPosFim-$intPosIni-1),1,0,'');
                $this->WriteText(substr($text,$intPosFim+1,strlen($text)));
            }
        }
        else
        {
            if (strpos($text,'<')!==false)
            {
                $this->Write(6,substr($text,0,strpos($text,'<')));
                $intPosIni = strpos($text,'<');
                $intPosFim = strpos($text,'>');
                $this->SetFont('','B');
                $this->WriteText(substr($text,$intPosIni+1,$intPosFim-$intPosIni-1));
                $this->SetFont('','');
                $this->WriteText(substr($text,$intPosFim+1,strlen($text)));
            }
            elseif (strpos($text,'[')!==false)
            {
                $this->Write(6,substr($text,0,strpos($text,'[')));
                $intPosIni = strpos($text,'[');
                $intPosFim = strpos($text,']');
                $w=$this->GetStringWidth('a')*($intPosFim-$intPosIni-1);
                $this->Cell($w,$this->FontSize+0.75,substr($text,$intPosIni+1,$intPosFim-$intPosIni-1),1,0,'');
                $this->WriteText(substr($text,$intPosFim+1,strlen($text)));
            }
            else
            {
                $this->Write(6,$text);
            }

        }
    }

    function SetWidths($w)
    {
        // Set the array of column widths
        $this->widths = $w;
    }

    function SetAligns($a)
    {
        // Set the array of column alignments
        $this->aligns = $a;
    }

    function Row($data)
    {
        // Calculate the height of the row
        $nb = 0;
        for($i=0;$i<count($data);$i++)
            $nb = max($nb,$this->NbLines($this->widths[$i],$data[$i]));
        $h = 6.5*$nb;
        // Issue a page break first if needed
        $this->CheckPageBreak($h);
        // Draw the cells of the row
        for($i=0;$i<count($data);$i++)
        {
            $w = $this->widths[$i];
            $a = isset($this->aligns[$i]) ? $this->aligns[$i] : 'L';
            // Save the current position
            $x = $this->GetX();
            $y = $this->GetY();
            // Draw the border
            $this->Rect($x,$y,$w,$h);
            // Print the text
            $this->MultiCell($w,6.5,$data[$i],0,$a);
            // Put the position to the right of the cell
            $this->SetXY($x+$w,$y);
        }
        // Go to the next line
        $this->Ln($h);
    }

    function CheckPageBreak($h)
    {
        // If the height h would cause an overflow, add a new page immediately
        if($this->GetY()+$h>$this->PageBreakTrigger)
            $this->AddPage($this->CurOrientation);
    }

    function NbLines($w, $txt)
    {
        // Compute the number of lines a MultiCell of width w will take
        if(!isset($this->CurrentFont))
            $this->Error('No font has been set');
        $cw = $this->CurrentFont['cw'];
        if($w==0)
            $w = $this->w-$this->rMargin-$this->x;
        $wmax = ($w-2*$this->cMargin)*1000/$this->FontSize;
        $s = str_replace("\r",'',(string)$txt);
        $nb = strlen($s);
        if($nb>0 && $s[$nb-1]=="\n")
            $nb--;
        $sep = -1;
        $i = 0;
        $j = 0;
        $l = 0;
        $nl = 1;
        while($i<$nb)
        {
            $c = $s[$i];
            if($c=="\n")
            {
                $i++;
                $sep = -1;
                $j = $i;
                $l = 0;
                $nl++;
                continue;
            }
            if($c==' ')
                $sep = $i;
            $l += $cw[$c];
            if($l>$wmax)
            {
                if($sep==-1)
                {
                    if($i==$j)
                        $i++;
                }
                else
                    $i = $sep+1;
                $sep = -1;
                $j = $i;
                $l = 0;
                $nl++;
            }
            else
                $i++;
        }
        return $nl;
    }
}
?>