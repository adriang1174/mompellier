<Page id="1" templateExtension="html" relativePath="." fullRelativePath="." secured="False" urlType="Relative" isIncluded="False" SSLAccess="False" isService="False" cachingEnabled="False" cachingDuration="1 minutes" wizardTheme="Blueprint" wizardThemeVersion="3.0" needGeneration="0">
	<Components>
		<Record id="2" sourceType="Table" urlType="Relative" secured="False" allowInsert="True" allowUpdate="True" allowDelete="True" validateData="True" preserveParameters="GET" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" connection="Connection2" name="participantes" dataSource="participantes" errorSummator="Error" wizardCaption="Agregar/Editar Participantes " wizardFormMethod="post" returnPage="participantes_list.ccp" PathID="participantes">
			<Components>
				<Button id="3" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Insert" operation="Insert" wizardCaption="Agregar" PathID="participantesButton_Insert">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="4" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Update" operation="Update" wizardCaption="Enviar" PathID="participantesButton_Update">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="5" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Delete" operation="Delete" wizardCaption="Borrar" PathID="participantesButton_Delete">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<TextBox id="7" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="Apellido" fieldSource="Apellido" required="True" caption="Apellido" wizardCaption="Apellido" wizardSize="50" wizardMaxLength="50" wizardIsPassword="False" PathID="participantesApellido">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="8" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="Nombre" fieldSource="Nombre" required="True" caption="Nombre" wizardCaption="Nombre" wizardSize="50" wizardMaxLength="50" wizardIsPassword="False" PathID="participantesNombre">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="9" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="Matricula" fieldSource="Matricula" required="True" caption="Matricula" wizardCaption="Matricula" wizardSize="15" wizardMaxLength="15" wizardIsPassword="False" PathID="participantesMatricula">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<ListBox id="10" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="Hospital" fieldSource="Hospital" required="True" caption="Hospital" wizardCaption="Hospital" wizardSize="50" wizardMaxLength="50" wizardIsPassword="False" PathID="participantesHospital" sourceType="Table" connection="Connection2" dataSource="hospitales" boundColumn="descripcion" textColumn="descripcion">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
					<TableParameters/>
					<SPParameters/>
					<SQLParameters/>
					<JoinTables/>
					<JoinLinks/>
					<Fields/>
				</ListBox>
				<ListBox id="11" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="Situacion" fieldSource="Situacion" required="True" caption="Situacion" wizardCaption="Situacion" wizardSize="20" wizardMaxLength="20" wizardIsPassword="False" PathID="participantesSituacion" sourceType="Table" connection="Connection2" dataSource="situaciones" boundColumn="descripcion" textColumn="descripcion">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
					<TableParameters/>
					<SPParameters/>
					<SQLParameters/>
					<JoinTables/>
					<JoinLinks/>
					<Fields/>
				</ListBox>
				<TextBox id="12" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="Telefono" fieldSource="Telefono" required="True" caption="Telefono" wizardCaption="Telefono" wizardSize="50" wizardMaxLength="50" wizardIsPassword="False" PathID="participantesTelefono">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="13" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="Mail" fieldSource="Mail" required="True" caption="Mail" wizardCaption="Mail" wizardSize="50" wizardMaxLength="128" wizardIsPassword="False" PathID="participantesMail">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<CheckBox id="14" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="Sobrante" fieldSource="asistio" required="True" caption="Sobrante" wizardCaption="Sobrante" wizardSize="50" wizardMaxLength="100" wizardIsPassword="False" PathID="participantesSobrante" checkedValue="1" uncheckedValue="0" defaultValue="1">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</CheckBox>
				<ListBox id="15" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="especialidad" PathID="participantesespecialidad" fieldSource="especialidad" sourceType="Table" connection="Connection2" dataSource="especialidades" boundColumn="Descripcion" textColumn="Descripcion">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
					<TableParameters/>
					<SPParameters/>
					<SQLParameters/>
					<JoinTables/>
					<JoinLinks/>
					<Fields/>
				</ListBox>
			</Components>
			<Events/>
			<TableParameters>
				<TableParameter id="6" conditionType="Parameter" useIsNull="False" field="id" parameterSource="id" dataType="Integer" logicOperator="And" searchConditionType="Equal" parameterType="URL" orderNumber="1"/>
			</TableParameters>
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
	</Components>
	<CodeFiles>
		<CodeFile id="Code" language="PHPTemplates" name="participantes_maint.php" forShow="True" url="participantes_maint.php" comment="//" codePage="windows-1252"/>
	</CodeFiles>
	<SecurityGroups/>
	<CachingParameters/>
	<Attributes/>
	<Features/>
	<Events/>
</Page>
