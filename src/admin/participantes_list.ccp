<Page id="1" templateExtension="html" relativePath="." fullRelativePath="." secured="False" urlType="Relative" isIncluded="False" SSLAccess="False" isService="False" cachingEnabled="False" cachingDuration="1 minutes" wizardTheme="Blueprint" wizardThemeVersion="3.0" needGeneration="0">
	<Components>
		<Record id="2" sourceType="Table" urlType="Relative" secured="False" allowInsert="False" allowUpdate="False" allowDelete="False" validateData="True" preserveParameters="None" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="participantesSearch" returnPage="participantes_list.ccp" wizardCaption=" Participantes Buscar" wizardOrientation="Vertical" wizardFormMethod="post" PathID="participantesSearch">
			<Components>
				<Button id="3" urlType="Relative" enableValidation="True" isDefault="False" name="Button_DoSearch" operation="Search" wizardCaption="Buscar" PathID="participantesSearchButton_DoSearch">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<TextBox id="4" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="s_Apellido" wizardCaption="Apellido" wizardSize="50" wizardMaxLength="50" wizardIsPassword="False" PathID="participantesSearchs_Apellido">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="6" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="s_Matricula" wizardCaption="Matricula" wizardSize="15" wizardMaxLength="15" wizardIsPassword="False" PathID="participantesSearchs_Matricula">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="7" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="s_Hospital" wizardCaption="Hospital" wizardSize="50" wizardMaxLength="50" wizardIsPassword="False" PathID="participantesSearchs_Hospital">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="8" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="s_Situacion" wizardCaption="Situacion" wizardSize="20" wizardMaxLength="20" wizardIsPassword="False" PathID="participantesSearchs_Situacion">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="9" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="s_Telefono" wizardCaption="Telefono" wizardSize="50" wizardMaxLength="50" wizardIsPassword="False" PathID="participantesSearchs_Telefono">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="10" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="s_Mail" wizardCaption="Mail" wizardSize="50" wizardMaxLength="128" wizardIsPassword="False" PathID="participantesSearchs_Mail">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
			</Components>
			<Events/>
			<TableParameters/>
			<SPParameters/>
			<SQLParameters/>
			<JoinTables/>
			<JoinLinks/>
			<Fields/>
			<ISPParameters/>
			<ISQLParameters/>
			<IFormElements/>
			<USPParameters/>
			<USQLParameters/>
			<UConditions/>
			<UFormElements/>
			<DSPParameters/>
			<DSQLParameters/>
			<DConditions/>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Record>
		<EditableGrid id="56" urlType="Relative" secured="False" emptyRows="0" allowInsert="False" allowUpdate="True" allowDelete="False" validateData="True" preserveParameters="GET" sourceType="Table" defaultPageSize="30" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" connection="Connection2" dataSource="participantes" name="participantes1" pageSizeLimit="100" wizardCaption=" Participantes Lista de" wizardGridType="Tabular" wizardSortingType="SimpleDir" wizardAltRecord="False" wizardRecordSeparator="False" wizardNoRecords="No hay registros" PathID="participantes1" pasteActions="pasteActions" activeCollection="TableParameters" pasteAsReplace="pasteAsReplace">
			<Components>
				<Sorter id="58" visible="True" name="Sorter_id" column="id" wizardCaption="Id" wizardSortingType="SimpleDir" wizardControl="id" PathID="participantes1Sorter_id">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="59" visible="True" name="Sorter_Apellido" column="Apellido" wizardCaption="Apellido" wizardSortingType="SimpleDir" wizardControl="Apellido" PathID="participantes1Sorter_Apellido">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="60" visible="True" name="Sorter_Nombre" column="Nombre" wizardCaption="Nombre" wizardSortingType="SimpleDir" wizardControl="Nombre" PathID="participantes1Sorter_Nombre">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="61" visible="True" name="Sorter_especialidad" column="especialidad" wizardCaption="Especialidad" wizardSortingType="SimpleDir" wizardControl="especialidad" PathID="participantes1Sorter_especialidad">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="62" visible="True" name="Sorter_Matricula" column="Matricula" wizardCaption="Matricula" wizardSortingType="SimpleDir" wizardControl="Matricula" PathID="participantes1Sorter_Matricula">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="63" visible="True" name="Sorter_Hospital" column="Hospital" wizardCaption="Hospital" wizardSortingType="SimpleDir" wizardControl="Hospital" PathID="participantes1Sorter_Hospital">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="64" visible="True" name="Sorter_Situacion" column="Situacion" wizardCaption="Situacion" wizardSortingType="SimpleDir" wizardControl="Situacion" PathID="participantes1Sorter_Situacion">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="65" visible="True" name="Sorter_Telefono" column="Telefono" wizardCaption="Telefono" wizardSortingType="SimpleDir" wizardControl="Telefono" PathID="participantes1Sorter_Telefono">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="66" visible="True" name="Sorter_Mail" column="Mail" wizardCaption="Mail" wizardSortingType="SimpleDir" wizardControl="Mail" PathID="participantes1Sorter_Mail">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="67" visible="True" name="Sorter_asistio" column="asistio" wizardCaption="Asistio" wizardSortingType="SimpleDir" wizardControl="asistio" PathID="participantes1Sorter_asistio">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Link id="68" visible="Yes" fieldSourceType="DBColumn" dataType="Integer" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="id" fieldSource="id" required="False" caption="Id" wizardCaption="Id" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="participantes1id" hrefSource="participantes_maint.ccp">
					<Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="88" sourceType="DataField" name="id" source="id"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
				<Label id="69" fieldSourceType="DBColumn" dataType="Text" html="False" name="Apellido" fieldSource="Apellido" required="True" caption="Apellido" wizardCaption="Apellido" wizardSize="50" wizardMaxLength="50" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="participantes1Apellido">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="70" fieldSourceType="DBColumn" dataType="Text" html="False" name="Nombre" fieldSource="Nombre" required="True" caption="Nombre" wizardCaption="Nombre" wizardSize="50" wizardMaxLength="50" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="participantes1Nombre">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="71" fieldSourceType="DBColumn" dataType="Text" html="False" name="especialidad" fieldSource="especialidad" required="True" caption="Especialidad" wizardCaption="Especialidad" wizardSize="50" wizardMaxLength="50" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="participantes1especialidad">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="72" fieldSourceType="DBColumn" dataType="Text" html="False" name="Matricula" fieldSource="Matricula" required="True" caption="Matricula" wizardCaption="Matricula" wizardSize="15" wizardMaxLength="15" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="participantes1Matricula">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="73" fieldSourceType="DBColumn" dataType="Text" html="False" name="Hospital" fieldSource="Hospital" required="True" caption="Hospital" wizardCaption="Hospital" wizardSize="50" wizardMaxLength="50" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="participantes1Hospital">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="74" fieldSourceType="DBColumn" dataType="Text" html="False" name="Situacion" fieldSource="Situacion" required="True" caption="Situacion" wizardCaption="Situacion" wizardSize="20" wizardMaxLength="20" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="participantes1Situacion">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="75" fieldSourceType="DBColumn" dataType="Text" html="False" name="Telefono" fieldSource="Telefono" required="True" caption="Telefono" wizardCaption="Telefono" wizardSize="50" wizardMaxLength="50" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="participantes1Telefono">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="76" fieldSourceType="DBColumn" dataType="Text" html="False" name="Mail" fieldSource="Mail" required="True" caption="Mail" wizardCaption="Mail" wizardSize="50" wizardMaxLength="128" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="participantes1Mail">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<CheckBox id="77" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="asistio" fieldSource="asistio" required="True" caption="Asistio" wizardCaption="Asistio" wizardSize="1" wizardMaxLength="1" wizardIsPassword="False" wizardUseTemplateBlock="False" checkedValue="1" uncheckedValue="0" PathID="participantes1asistio">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</CheckBox>
				<Navigator id="78" size="10" type="Simple" pageSizes="1;5;10;25;50" name="Navigator" wizardPagingType="Custom" wizardFirst="True" wizardFirstText="|&lt;" wizardPrev="True" wizardPrevText="&lt;" wizardNext="True" wizardNextText="&gt;" wizardLast="True" wizardLastText="&gt;|" wizardPageNumbers="Simple" wizardSize="10" wizardTotalPages="True" wizardHideDisabled="False" wizardPageSize="False" wizardOfText="de" wizardUsePageScroller="True">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Navigator>
				<Button id="79" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Submit" operation="Submit" wizardCaption="Enviar" PathID="participantes1Button_Submit">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<Link id="80" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="participantes_Insert" hrefSource="participantes_maint.ccp" removeParameters="id" wizardThemeItem="NavigatorLink" wizardDefaultValue="Agregar Nuevo" PathID="participantes1participantes_Insert">
					<Components/>
					<Events/>
					<LinkParameters/>
					<Attributes/>
					<Features/>
				</Link>
				<Link id="89" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="Link1" PathID="participantes1Link1" hrefSource="certificado.php" wizardUseTemplateBlock="False">
					<Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="90" sourceType="DataField" format="yyyy-mm-dd" name="id" source="id"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
				<Link id="91" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="Link2" PathID="participantes1Link2" hrefSource="certificado_multi.php" wizardUseTemplateBlock="False">
					<Components/>
					<Events/>
					<LinkParameters/>
					<Attributes/>
					<Features/>
				</Link>
				<Link id="92" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="Link3" PathID="participantes1Link3" hrefSource="certificado_fondo.php" wizardUseTemplateBlock="False">
<Components/>
<Events/>
<LinkParameters>
<LinkParameter id="93" sourceType="DataField" format="yyyy-mm-dd" name="id" source="id"/>
</LinkParameters>
<Attributes/>
<Features/>
</Link>
<Link id="94" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="Link4" PathID="participantes1Link4" hrefSource="certificado_multifondo.php" wizardUseTemplateBlock="False">
<Components/>
<Events/>
<LinkParameters/>
<Attributes/>
<Features/>
</Link>
</Components>
			<Events/>
			<TableParameters>
				<TableParameter id="82" conditionType="Parameter" useIsNull="False" field="Apellido" dataType="Text" searchConditionType="Contains" parameterType="URL" logicOperator="And" parameterSource="s_Apellido"/>
				<TableParameter id="83" conditionType="Parameter" useIsNull="False" field="Matricula" dataType="Text" searchConditionType="Contains" parameterType="URL" logicOperator="And" parameterSource="s_Matricula"/>
				<TableParameter id="85" conditionType="Parameter" useIsNull="False" field="Hospital" dataType="Text" searchConditionType="Contains" parameterType="URL" logicOperator="And" parameterSource="s_Hospital"/>
				<TableParameter id="84" conditionType="Parameter" useIsNull="False" field="Situacion" dataType="Text" searchConditionType="Contains" parameterType="URL" logicOperator="And" parameterSource="s_Situacion"/>
				<TableParameter id="86" conditionType="Parameter" useIsNull="False" field="Telefono" dataType="Text" searchConditionType="Contains" parameterType="URL" logicOperator="And" parameterSource="s_Telefono"/>
				<TableParameter id="87" conditionType="Parameter" useIsNull="False" field="Mail" dataType="Text" searchConditionType="Contains" parameterType="URL" logicOperator="And" parameterSource="s_Mail"/>
			</TableParameters>
			<SPParameters/>
			<SQLParameters/>
			<JoinTables>
				<JoinTable id="81" tableName="participantes" posLeft="10" posTop="10" posWidth="115" posHeight="180"/>
			</JoinTables>
			<JoinLinks/>
			<Fields/>
			<PKFields>
				<PKField id="57" tableName="participantes" fieldName="id" dataType="Integer"/>
			</PKFields>
			<ISPParameters/>
			<ISQLParameters/>
			<IFormElements/>
			<USPParameters/>
			<USQLParameters/>
			<UConditions/>
			<UFormElements/>
			<DSPParameters/>
			<DSQLParameters/>
			<DConditions/>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</EditableGrid>
	</Components>
	<CodeFiles>
		<CodeFile id="Code" language="PHPTemplates" name="participantes_list.php" forShow="True" url="participantes_list.php" comment="//" codePage="windows-1252"/>
	</CodeFiles>
	<SecurityGroups/>
	<CachingParameters/>
	<Attributes/>
	<Features/>
	<Events/>
</Page>
