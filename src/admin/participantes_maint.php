<?php
//Include Common Files @1-17CDBC2C
define("RelativePath", ".");
define("PathToCurrentPage", "/");
define("FileName", "participantes_maint.php");
include_once(RelativePath . "/Common.php");
include_once(RelativePath . "/Template.php");
include_once(RelativePath . "/Sorter.php");
include_once(RelativePath . "/Navigator.php");
//End Include Common Files

class clsRecordparticipantes { //participantes Class @2-EE7F90B2

//Variables @2-9E315808

    // Public variables
    public $ComponentType = "Record";
    public $ComponentName;
    public $Parent;
    public $HTMLFormAction;
    public $PressedButton;
    public $Errors;
    public $ErrorBlock;
    public $FormSubmitted;
    public $FormEnctype;
    public $Visible;
    public $IsEmpty;

    public $CCSEvents = "";
    public $CCSEventResult;

    public $RelativePath = "";

    public $InsertAllowed = false;
    public $UpdateAllowed = false;
    public $DeleteAllowed = false;
    public $ReadAllowed   = false;
    public $EditMode      = false;
    public $ds;
    public $DataSource;
    public $ValidatingControls;
    public $Controls;
    public $Attributes;

    // Class variables
//End Variables

//Class_Initialize Event @2-E617B1CF
    function clsRecordparticipantes($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Record participantes/Error";
        $this->DataSource = new clsparticipantesDataSource($this);
        $this->ds = & $this->DataSource;
        $this->InsertAllowed = true;
        $this->UpdateAllowed = true;
        $this->DeleteAllowed = true;
        $this->ReadAllowed = true;
        if($this->Visible)
        {
            $this->ComponentName = "participantes";
            $this->Attributes = new clsAttributes($this->ComponentName . ":");
            $CCSForm = explode(":", CCGetFromGet("ccsForm", ""), 2);
            if(sizeof($CCSForm) == 1)
                $CCSForm[1] = "";
            list($FormName, $FormMethod) = $CCSForm;
            $this->EditMode = ($FormMethod == "Edit");
            $this->FormEnctype = "application/x-www-form-urlencoded";
            $this->FormSubmitted = ($FormName == $this->ComponentName);
            $Method = $this->FormSubmitted ? ccsPost : ccsGet;
            $this->Button_Insert = new clsButton("Button_Insert", $Method, $this);
            $this->Button_Update = new clsButton("Button_Update", $Method, $this);
            $this->Button_Delete = new clsButton("Button_Delete", $Method, $this);
            $this->Apellido = new clsControl(ccsTextBox, "Apellido", "Apellido", ccsText, "", CCGetRequestParam("Apellido", $Method, NULL), $this);
            $this->Apellido->Required = true;
            $this->Nombre = new clsControl(ccsTextBox, "Nombre", "Nombre", ccsText, "", CCGetRequestParam("Nombre", $Method, NULL), $this);
            $this->Nombre->Required = true;
            $this->Matricula = new clsControl(ccsTextBox, "Matricula", "Matricula", ccsText, "", CCGetRequestParam("Matricula", $Method, NULL), $this);
            $this->Matricula->Required = true;
            $this->Hospital = new clsControl(ccsListBox, "Hospital", "Hospital", ccsText, "", CCGetRequestParam("Hospital", $Method, NULL), $this);
            $this->Hospital->DSType = dsTable;
            $this->Hospital->DataSource = new clsDBConnection2();
            $this->Hospital->ds = & $this->Hospital->DataSource;
            $this->Hospital->DataSource->SQL = "SELECT * \n" .
"FROM hospitales {SQL_Where} {SQL_OrderBy}";
            list($this->Hospital->BoundColumn, $this->Hospital->TextColumn, $this->Hospital->DBFormat) = array("descripcion", "descripcion", "");
            $this->Hospital->Required = true;
            $this->Situacion = new clsControl(ccsListBox, "Situacion", "Situacion", ccsText, "", CCGetRequestParam("Situacion", $Method, NULL), $this);
            $this->Situacion->DSType = dsTable;
            $this->Situacion->DataSource = new clsDBConnection2();
            $this->Situacion->ds = & $this->Situacion->DataSource;
            $this->Situacion->DataSource->SQL = "SELECT * \n" .
"FROM situaciones {SQL_Where} {SQL_OrderBy}";
            list($this->Situacion->BoundColumn, $this->Situacion->TextColumn, $this->Situacion->DBFormat) = array("descripcion", "descripcion", "");
            $this->Situacion->Required = true;
            $this->Telefono = new clsControl(ccsTextBox, "Telefono", "Telefono", ccsText, "", CCGetRequestParam("Telefono", $Method, NULL), $this);
            $this->Telefono->Required = true;
            $this->Mail = new clsControl(ccsTextBox, "Mail", "Mail", ccsText, "", CCGetRequestParam("Mail", $Method, NULL), $this);
            $this->Mail->Required = true;
            $this->Sobrante = new clsControl(ccsCheckBox, "Sobrante", "Sobrante", ccsText, "", CCGetRequestParam("Sobrante", $Method, NULL), $this);
            $this->Sobrante->CheckedValue = $this->Sobrante->GetParsedValue(1);
            $this->Sobrante->UncheckedValue = $this->Sobrante->GetParsedValue(0);
            $this->especialidad = new clsControl(ccsListBox, "especialidad", "especialidad", ccsText, "", CCGetRequestParam("especialidad", $Method, NULL), $this);
            $this->especialidad->DSType = dsTable;
            $this->especialidad->DataSource = new clsDBConnection2();
            $this->especialidad->ds = & $this->especialidad->DataSource;
            $this->especialidad->DataSource->SQL = "SELECT * \n" .
"FROM especialidades {SQL_Where} {SQL_OrderBy}";
            list($this->especialidad->BoundColumn, $this->especialidad->TextColumn, $this->especialidad->DBFormat) = array("Descripcion", "Descripcion", "");
            if(!$this->FormSubmitted) {
                if(!is_array($this->Sobrante->Value) && !strlen($this->Sobrante->Value) && $this->Sobrante->Value !== false)
                    $this->Sobrante->SetValue(true);
            }
        }
    }
//End Class_Initialize Event

//Initialize Method @2-2832F4DC
    function Initialize()
    {

        if(!$this->Visible)
            return;

        $this->DataSource->Parameters["urlid"] = CCGetFromGet("id", NULL);
    }
//End Initialize Method

//Validate Method @2-D40CB91E
    function Validate()
    {
        global $CCSLocales;
        $Validation = true;
        $Where = "";
        $Validation = ($this->Apellido->Validate() && $Validation);
        $Validation = ($this->Nombre->Validate() && $Validation);
        $Validation = ($this->Matricula->Validate() && $Validation);
        $Validation = ($this->Hospital->Validate() && $Validation);
        $Validation = ($this->Situacion->Validate() && $Validation);
        $Validation = ($this->Telefono->Validate() && $Validation);
        $Validation = ($this->Mail->Validate() && $Validation);
        $Validation = ($this->Sobrante->Validate() && $Validation);
        $Validation = ($this->especialidad->Validate() && $Validation);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);
        $Validation =  $Validation && ($this->Apellido->Errors->Count() == 0);
        $Validation =  $Validation && ($this->Nombre->Errors->Count() == 0);
        $Validation =  $Validation && ($this->Matricula->Errors->Count() == 0);
        $Validation =  $Validation && ($this->Hospital->Errors->Count() == 0);
        $Validation =  $Validation && ($this->Situacion->Errors->Count() == 0);
        $Validation =  $Validation && ($this->Telefono->Errors->Count() == 0);
        $Validation =  $Validation && ($this->Mail->Errors->Count() == 0);
        $Validation =  $Validation && ($this->Sobrante->Errors->Count() == 0);
        $Validation =  $Validation && ($this->especialidad->Errors->Count() == 0);
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//CheckErrors Method @2-F33644F8
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->Apellido->Errors->Count());
        $errors = ($errors || $this->Nombre->Errors->Count());
        $errors = ($errors || $this->Matricula->Errors->Count());
        $errors = ($errors || $this->Hospital->Errors->Count());
        $errors = ($errors || $this->Situacion->Errors->Count());
        $errors = ($errors || $this->Telefono->Errors->Count());
        $errors = ($errors || $this->Mail->Errors->Count());
        $errors = ($errors || $this->Sobrante->Errors->Count());
        $errors = ($errors || $this->especialidad->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        $errors = ($errors || $this->DataSource->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//MasterDetail @2-ED598703
function SetPrimaryKeys($keyArray)
{
    $this->PrimaryKeys = $keyArray;
}
function GetPrimaryKeys()
{
    return $this->PrimaryKeys;
}
function GetPrimaryKey($keyName)
{
    return $this->PrimaryKeys[$keyName];
}
//End MasterDetail

//Operation Method @2-90FBF87F
    function Operation()
    {
        if(!$this->Visible)
            return;

        global $Redirect;
        global $FileName;

        $this->DataSource->Prepare();
        if(!$this->FormSubmitted) {
            $this->EditMode = $this->DataSource->AllParametersSet;
            return;
        }

        if($this->FormSubmitted) {
            $this->PressedButton = $this->EditMode ? "Button_Update" : "Button_Insert";
            if($this->Button_Insert->Pressed) {
                $this->PressedButton = "Button_Insert";
            } else if($this->Button_Update->Pressed) {
                $this->PressedButton = "Button_Update";
            } else if($this->Button_Delete->Pressed) {
                $this->PressedButton = "Button_Delete";
            }
        }
        $Redirect = "participantes_list.php" . "?" . CCGetQueryString("QueryString", array("ccsForm"));
        if($this->PressedButton == "Button_Delete") {
            if(!CCGetEvent($this->Button_Delete->CCSEvents, "OnClick", $this->Button_Delete) || !$this->DeleteRow()) {
                $Redirect = "";
            }
        } else if($this->Validate()) {
            if($this->PressedButton == "Button_Insert") {
                if(!CCGetEvent($this->Button_Insert->CCSEvents, "OnClick", $this->Button_Insert) || !$this->InsertRow()) {
                    $Redirect = "";
                }
            } else if($this->PressedButton == "Button_Update") {
                if(!CCGetEvent($this->Button_Update->CCSEvents, "OnClick", $this->Button_Update) || !$this->UpdateRow()) {
                    $Redirect = "";
                }
            }
        } else {
            $Redirect = "";
        }
        if ($Redirect)
            $this->DataSource->close();
    }
//End Operation Method

//InsertRow Method @2-E68A3591
    function InsertRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeInsert", $this);
        if(!$this->InsertAllowed) return false;
        $this->DataSource->Apellido->SetValue($this->Apellido->GetValue(true));
        $this->DataSource->Nombre->SetValue($this->Nombre->GetValue(true));
        $this->DataSource->Matricula->SetValue($this->Matricula->GetValue(true));
        $this->DataSource->Hospital->SetValue($this->Hospital->GetValue(true));
        $this->DataSource->Situacion->SetValue($this->Situacion->GetValue(true));
        $this->DataSource->Telefono->SetValue($this->Telefono->GetValue(true));
        $this->DataSource->Mail->SetValue($this->Mail->GetValue(true));
        $this->DataSource->Sobrante->SetValue($this->Sobrante->GetValue(true));
        $this->DataSource->especialidad->SetValue($this->especialidad->GetValue(true));
        $this->DataSource->Insert();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterInsert", $this);
        return (!$this->CheckErrors());
    }
//End InsertRow Method

//UpdateRow Method @2-663A9A38
    function UpdateRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeUpdate", $this);
        if(!$this->UpdateAllowed) return false;
        $this->DataSource->Apellido->SetValue($this->Apellido->GetValue(true));
        $this->DataSource->Nombre->SetValue($this->Nombre->GetValue(true));
        $this->DataSource->Matricula->SetValue($this->Matricula->GetValue(true));
        $this->DataSource->Hospital->SetValue($this->Hospital->GetValue(true));
        $this->DataSource->Situacion->SetValue($this->Situacion->GetValue(true));
        $this->DataSource->Telefono->SetValue($this->Telefono->GetValue(true));
        $this->DataSource->Mail->SetValue($this->Mail->GetValue(true));
        $this->DataSource->Sobrante->SetValue($this->Sobrante->GetValue(true));
        $this->DataSource->especialidad->SetValue($this->especialidad->GetValue(true));
        $this->DataSource->Update();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterUpdate", $this);
        return (!$this->CheckErrors());
    }
//End UpdateRow Method

//DeleteRow Method @2-299D98C3
    function DeleteRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeDelete", $this);
        if(!$this->DeleteAllowed) return false;
        $this->DataSource->Delete();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterDelete", $this);
        return (!$this->CheckErrors());
    }
//End DeleteRow Method

//Show Method @2-B6581B0B
    function Show()
    {
        global $CCSUseAmp;
        global $Tpl;
        global $FileName;
        global $CCSLocales;
        $Error = "";

        if(!$this->Visible)
            return;

        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeSelect", $this);

        $this->Hospital->Prepare();
        $this->Situacion->Prepare();
        $this->especialidad->Prepare();

        $RecordBlock = "Record " . $this->ComponentName;
        $ParentPath = $Tpl->block_path;
        $Tpl->block_path = $ParentPath . "/" . $RecordBlock;
        $this->EditMode = $this->EditMode && $this->ReadAllowed;
        if($this->EditMode) {
            if($this->DataSource->Errors->Count()){
                $this->Errors->AddErrors($this->DataSource->Errors);
                $this->DataSource->Errors->clear();
            }
            $this->DataSource->Open();
            if($this->DataSource->Errors->Count() == 0 && $this->DataSource->next_record()) {
                $this->DataSource->SetValues();
                if(!$this->FormSubmitted){
                    $this->Apellido->SetValue($this->DataSource->Apellido->GetValue());
                    $this->Nombre->SetValue($this->DataSource->Nombre->GetValue());
                    $this->Matricula->SetValue($this->DataSource->Matricula->GetValue());
                    $this->Hospital->SetValue($this->DataSource->Hospital->GetValue());
                    $this->Situacion->SetValue($this->DataSource->Situacion->GetValue());
                    $this->Telefono->SetValue($this->DataSource->Telefono->GetValue());
                    $this->Mail->SetValue($this->DataSource->Mail->GetValue());
                    $this->Sobrante->SetValue($this->DataSource->Sobrante->GetValue());
                    $this->especialidad->SetValue($this->DataSource->especialidad->GetValue());
                }
            } else {
                $this->EditMode = false;
            }
        }

        if($this->FormSubmitted || $this->CheckErrors()) {
            $Error = "";
            $Error = ComposeStrings($Error, $this->Apellido->Errors->ToString());
            $Error = ComposeStrings($Error, $this->Nombre->Errors->ToString());
            $Error = ComposeStrings($Error, $this->Matricula->Errors->ToString());
            $Error = ComposeStrings($Error, $this->Hospital->Errors->ToString());
            $Error = ComposeStrings($Error, $this->Situacion->Errors->ToString());
            $Error = ComposeStrings($Error, $this->Telefono->Errors->ToString());
            $Error = ComposeStrings($Error, $this->Mail->Errors->ToString());
            $Error = ComposeStrings($Error, $this->Sobrante->Errors->ToString());
            $Error = ComposeStrings($Error, $this->especialidad->Errors->ToString());
            $Error = ComposeStrings($Error, $this->Errors->ToString());
            $Error = ComposeStrings($Error, $this->DataSource->Errors->ToString());
            $Tpl->SetVar("Error", $Error);
            $Tpl->Parse("Error", false);
        }
        $CCSForm = $this->EditMode ? $this->ComponentName . ":" . "Edit" : $this->ComponentName;
        $this->HTMLFormAction = $FileName . "?" . CCAddParam(CCGetQueryString("QueryString", ""), "ccsForm", $CCSForm);
        $Tpl->SetVar("Action", !$CCSUseAmp ? $this->HTMLFormAction : str_replace("&", "&amp;", $this->HTMLFormAction));
        $Tpl->SetVar("HTMLFormName", $this->ComponentName);
        $Tpl->SetVar("HTMLFormEnctype", $this->FormEnctype);
        $this->Button_Insert->Visible = !$this->EditMode && $this->InsertAllowed;
        $this->Button_Update->Visible = $this->EditMode && $this->UpdateAllowed;
        $this->Button_Delete->Visible = $this->EditMode && $this->DeleteAllowed;

        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShow", $this);
        $this->Attributes->Show();
        if(!$this->Visible) {
            $Tpl->block_path = $ParentPath;
            return;
        }

        $this->Button_Insert->Show();
        $this->Button_Update->Show();
        $this->Button_Delete->Show();
        $this->Apellido->Show();
        $this->Nombre->Show();
        $this->Matricula->Show();
        $this->Hospital->Show();
        $this->Situacion->Show();
        $this->Telefono->Show();
        $this->Mail->Show();
        $this->Sobrante->Show();
        $this->especialidad->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

} //End participantes Class @2-FCB6E20C

class clsparticipantesDataSource extends clsDBConnection2 {  //participantesDataSource Class @2-90CEF4F8

//DataSource Variables @2-CDC83E2C
    public $Parent = "";
    public $CCSEvents = "";
    public $CCSEventResult;
    public $ErrorBlock;
    public $CmdExecution;

    public $InsertParameters;
    public $UpdateParameters;
    public $DeleteParameters;
    public $wp;
    public $AllParametersSet;

    public $InsertFields = array();
    public $UpdateFields = array();

    // Datasource fields
    public $Apellido;
    public $Nombre;
    public $Matricula;
    public $Hospital;
    public $Situacion;
    public $Telefono;
    public $Mail;
    public $Sobrante;
    public $especialidad;
//End DataSource Variables

//DataSourceClass_Initialize Event @2-9E0DB52A
    function clsparticipantesDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Record participantes/Error";
        $this->Initialize();
        $this->Apellido = new clsField("Apellido", ccsText, "");
        
        $this->Nombre = new clsField("Nombre", ccsText, "");
        
        $this->Matricula = new clsField("Matricula", ccsText, "");
        
        $this->Hospital = new clsField("Hospital", ccsText, "");
        
        $this->Situacion = new clsField("Situacion", ccsText, "");
        
        $this->Telefono = new clsField("Telefono", ccsText, "");
        
        $this->Mail = new clsField("Mail", ccsText, "");
        
        $this->Sobrante = new clsField("Sobrante", ccsText, "");
        
        $this->especialidad = new clsField("especialidad", ccsText, "");
        

        $this->InsertFields["Apellido"] = array("Name" => "Apellido", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["Nombre"] = array("Name" => "Nombre", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["Matricula"] = array("Name" => "Matricula", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["Hospital"] = array("Name" => "Hospital", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["Situacion"] = array("Name" => "Situacion", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["Telefono"] = array("Name" => "Telefono", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["Mail"] = array("Name" => "Mail", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["asistio"] = array("Name" => "asistio", "Value" => "", "DataType" => ccsText);
        $this->InsertFields["especialidad"] = array("Name" => "especialidad", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["Apellido"] = array("Name" => "Apellido", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["Nombre"] = array("Name" => "Nombre", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["Matricula"] = array("Name" => "Matricula", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["Hospital"] = array("Name" => "Hospital", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["Situacion"] = array("Name" => "Situacion", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["Telefono"] = array("Name" => "Telefono", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["Mail"] = array("Name" => "Mail", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["asistio"] = array("Name" => "asistio", "Value" => "", "DataType" => ccsText);
        $this->UpdateFields["especialidad"] = array("Name" => "especialidad", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
    }
//End DataSourceClass_Initialize Event

//Prepare Method @2-35B33087
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urlid", ccsInteger, "", "", $this->Parameters["urlid"], "", false);
        $this->AllParametersSet = $this->wp->AllParamsSet();
        $this->wp->Criterion[1] = $this->wp->Operation(opEqual, "id", $this->wp->GetDBValue("1"), $this->ToSQL($this->wp->GetDBValue("1"), ccsInteger),false);
        $this->Where = 
             $this->wp->Criterion[1];
    }
//End Prepare Method

//Open Method @2-4025D118
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->SQL = "SELECT * \n\n" .
        "FROM participantes {SQL_Where} {SQL_OrderBy}";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        $this->PageSize = 1;
        $this->query($this->OptimizeSQL(CCBuildSQL($this->SQL, $this->Where, $this->Order)));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @2-358BD69A
    function SetValues()
    {
        $this->Apellido->SetDBValue($this->f("Apellido"));
        $this->Nombre->SetDBValue($this->f("Nombre"));
        $this->Matricula->SetDBValue($this->f("Matricula"));
        $this->Hospital->SetDBValue($this->f("Hospital"));
        $this->Situacion->SetDBValue($this->f("Situacion"));
        $this->Telefono->SetDBValue($this->f("Telefono"));
        $this->Mail->SetDBValue($this->f("Mail"));
        $this->Sobrante->SetDBValue($this->f("asistio"));
        $this->especialidad->SetDBValue($this->f("especialidad"));
    }
//End SetValues Method

//Insert Method @2-46153FB9
    function Insert()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildInsert", $this->Parent);
        $this->InsertFields["Apellido"]["Value"] = $this->Apellido->GetDBValue(true);
        $this->InsertFields["Nombre"]["Value"] = $this->Nombre->GetDBValue(true);
        $this->InsertFields["Matricula"]["Value"] = $this->Matricula->GetDBValue(true);
        $this->InsertFields["Hospital"]["Value"] = $this->Hospital->GetDBValue(true);
        $this->InsertFields["Situacion"]["Value"] = $this->Situacion->GetDBValue(true);
        $this->InsertFields["Telefono"]["Value"] = $this->Telefono->GetDBValue(true);
        $this->InsertFields["Mail"]["Value"] = $this->Mail->GetDBValue(true);
        $this->InsertFields["asistio"]["Value"] = $this->Sobrante->GetDBValue(true);
        $this->InsertFields["especialidad"]["Value"] = $this->especialidad->GetDBValue(true);
        $this->SQL = CCBuildInsert("participantes", $this->InsertFields, $this);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteInsert", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteInsert", $this->Parent);
        }
    }
//End Insert Method

//Update Method @2-8B172438
    function Update()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildUpdate", $this->Parent);
        $this->UpdateFields["Apellido"]["Value"] = $this->Apellido->GetDBValue(true);
        $this->UpdateFields["Nombre"]["Value"] = $this->Nombre->GetDBValue(true);
        $this->UpdateFields["Matricula"]["Value"] = $this->Matricula->GetDBValue(true);
        $this->UpdateFields["Hospital"]["Value"] = $this->Hospital->GetDBValue(true);
        $this->UpdateFields["Situacion"]["Value"] = $this->Situacion->GetDBValue(true);
        $this->UpdateFields["Telefono"]["Value"] = $this->Telefono->GetDBValue(true);
        $this->UpdateFields["Mail"]["Value"] = $this->Mail->GetDBValue(true);
        $this->UpdateFields["asistio"]["Value"] = $this->Sobrante->GetDBValue(true);
        $this->UpdateFields["especialidad"]["Value"] = $this->especialidad->GetDBValue(true);
        $this->SQL = CCBuildUpdate("participantes", $this->UpdateFields, $this);
        $this->SQL .= strlen($this->Where) ? " WHERE " . $this->Where : $this->Where;
        if (!strlen($this->Where) && $this->Errors->Count() == 0) 
            $this->Errors->addError($CCSLocales->GetText("CCS_CustomOperationError_MissingParameters"));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteUpdate", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteUpdate", $this->Parent);
        }
    }
//End Update Method

//Delete Method @2-25B5671B
    function Delete()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildDelete", $this->Parent);
        $this->SQL = "DELETE FROM participantes";
        $this->SQL = CCBuildSQL($this->SQL, $this->Where, "");
        if (!strlen($this->Where) && $this->Errors->Count() == 0) 
            $this->Errors->addError($CCSLocales->GetText("CCS_CustomOperationError_MissingParameters"));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteDelete", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteDelete", $this->Parent);
        }
    }
//End Delete Method

} //End participantesDataSource Class @2-FCB6E20C

//Initialize Page @1-1B9A166A
// Variables
$FileName = "";
$Redirect = "";
$Tpl = "";
$TemplateFileName = "";
$BlockToParse = "";
$ComponentName = "";
$Attributes = "";

// Events;
$CCSEvents = "";
$CCSEventResult = "";

$FileName = FileName;
$Redirect = "";
$TemplateFileName = "participantes_maint.html";
$BlockToParse = "main";
$TemplateEncoding = "CP1252";
$ContentType = "text/html";
$PathToRoot = "./";
$Charset = $Charset ? $Charset : "windows-1252";
//End Initialize Page

//Before Initialize @1-E870CEBC
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeInitialize", $MainPage);
//End Before Initialize

//Initialize Objects @1-AB28C1C5
$DBConnection2 = new clsDBConnection2();
$MainPage->Connections["Connection2"] = & $DBConnection2;
$Attributes = new clsAttributes("page:");
$MainPage->Attributes = & $Attributes;

// Controls
$participantes = new clsRecordparticipantes("", $MainPage);
$MainPage->participantes = & $participantes;
$participantes->Initialize();

$CCSEventResult = CCGetEvent($CCSEvents, "AfterInitialize", $MainPage);

if ($Charset) {
    header("Content-Type: " . $ContentType . "; charset=" . $Charset);
} else {
    header("Content-Type: " . $ContentType);
}
//End Initialize Objects

//Initialize HTML Template @1-E710DB26
$CCSEventResult = CCGetEvent($CCSEvents, "OnInitializeView", $MainPage);
$Tpl = new clsTemplate($FileEncoding, $TemplateEncoding);
$Tpl->LoadTemplate(PathToCurrentPage . $TemplateFileName, $BlockToParse, "CP1252");
$Tpl->block_path = "/$BlockToParse";
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeShow", $MainPage);
$Attributes->SetValue("pathToRoot", "");
$Attributes->Show();
//End Initialize HTML Template

//Execute Components @1-5BF95A76
$participantes->Operation();
//End Execute Components

//Go to destination page @1-27C31E07
if($Redirect)
{
    $CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
    $DBConnection2->close();
    header("Location: " . $Redirect);
    unset($participantes);
    unset($Tpl);
    exit;
}
//End Go to destination page

//Show Page @1-63A49C64
$participantes->Show();
$Tpl->block_path = "";
$Tpl->Parse($BlockToParse, false);
if (!isset($main_block)) $main_block = $Tpl->GetVar($BlockToParse);
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeOutput", $MainPage);
if ($CCSEventResult) echo $main_block;
//End Show Page

//Unload Page @1-75755D57
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
$DBConnection2->close();
unset($participantes);
unset($Tpl);
//End Unload Page


?>
