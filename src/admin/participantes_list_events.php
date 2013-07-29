<?php
//BindEvents Method @1-8310BF0F
function BindEvents()
{
    global $participantes;
    $participantes->Navigator->CCSEvents["BeforeShow"] = "participantes_Navigator_BeforeShow";
}
//End BindEvents Method

//participantes_Navigator_BeforeShow @51-F7DEC7DD
function participantes_Navigator_BeforeShow(& $sender)
{
    $participantes_Navigator_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $participantes; //Compatibility
//End participantes_Navigator_BeforeShow

//Hide-Show Component @52-0DB41530
    $Parameter1 = $Container->DataSource->PageCount();
    $Parameter2 = 2;
    if (((is_array($Parameter1) || strlen($Parameter1)) && (is_array($Parameter2) || strlen($Parameter2))) && 0 >  CCCompareValues($Parameter1, $Parameter2, ccsInteger))
        $Component->Visible = false;
//End Hide-Show Component

//Close participantes_Navigator_BeforeShow @51-3599C234
    return $participantes_Navigator_BeforeShow;
}
//End Close participantes_Navigator_BeforeShow


?>
