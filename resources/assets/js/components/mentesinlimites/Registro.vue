<template>
<div class="">
  <template v-if="paso === 1">
    <div class="container">
      <a class="logo"><img src="public/assets/mentesinlimites/img/logo.png"></a>

      <div class="row ">

          <div class="col-12 text-top">
              <p><span class="text-01">BIENVENIDOS</span><span class="text-02">AL LANZAMIENTO VIRTUAL</span></p>
          </div>

          <div class="col-12 title">
              <h1>Por una mente<br><span class="big">sin límites</span></h1>

              <h2>La correcta nutrición desde el inicio, marca la diferencia</h2>

          </div>

          <div class="col-12">

              <div class="fecha">

                  <div class="fecha-wrapper">

                      <div class="col-fecha">

                          <i class="icon date"></i>

                          <span class="date">14 JULIO</span>

                      </div>

                      <div class="col-fecha">

                          <i class="icon reloj"></i>

                          <span class="hour">7:00 PM</span>

                      </div>

                  </div>

              </div>

          </div>

      </div>

      <div class="row mt-4 mb-5">

          <div class="col-12">

              <button class="btn btn-primary btn-big ml-auto mr-auto d-table" @click="irAlPaso(2)">Ingresar al evento</button>

          </div>

      </div>
    </div>
  </template>
  <template v-else-if="paso === 2">  
			<div class="container container-general">

				<div class="row ">

					

					<div class="col-md-8 title order-2 order-md-1">

						<p class="text-top"><span class="text-02">LANZAMIENTO VIRTUAL</span></p>

						<h1>Por una mente sin límites</h1>

						<h2>La correcta nutrición desde el inicio, marca la diferencia</h2>

					</div>



					<div class="col-md-4 order-1 order-md-2">

						<a class="logo"><img src="public/assets/mentesinlimites/img/logo.png"></a>

					</div>

				</div>

			</div>

			<div class="container">

				<div class="row ">

					<div class="col-12 box-texto">

						<div class="inner">

							<div class="content-scroll">

								<h5>TÉRMINOS Y CONDICIONES</h5>

								<p>Este sitio web (en adelante, el “Sitio Web”) es operado por Química International Services LLC (en adelante, “Química”) y se sujeta a los presentes términos y condiciones (en adelante, los “Términos y Condiciones del Sitio Web”). <br><br>
									El Sitio Web está destinado a eventos virtuales, con presencia de stand y charlas de forma pregrabada y en vivo, conferencias, cursos, entre otros.</p>

								<p class="text-center">
                  <a @click="irAlPaso(3)" style="cursor:pointer;">Conozca aquí nuestro aviso de privacidad</a>
                </p>



								<button class="btn btn-primary ml-auto mr-auto d-table mt-4 mb-3" @click="irAlPaso(4)">Aceptar y proceder al registro</button>

							</div>

						</div>

						

					</div>

				</div>

			</div>
  </template>
  <template v-else-if="paso === 3">  
			<div class="container container-general">

				<div class="row ">

					

					<div class="col-md-8 title order-2 order-md-1">

						<p class="text-top"><span class="text-02">LANZAMIENTO VIRTUAL</span></p>

						<h1>Por una mente sin límites</h1>

						<h2>La correcta nutrición desde el inicio, marca la diferencia</h2>

					</div>



					<div class="col-md-4 order-1 order-md-2">

						<a class="logo"><img src="public/assets/mentesinlimites/img/logo.png"></a>

					</div>

				</div>

			</div>

			<div class="container">

				<div class="row ">

					<div class="col-12 box-texto">

						<div class="inner">

							<div class="content-scroll">

								<h5>AVISO DE PRIVACIDAD DE DATOS</h5>

								<p>Abbott Laboratorios Limitada, con dirección en 5ª. Avenida 5-55, zona 14, Europlaza Torre 1, Nivel 10, Guatemala, ciudad. es responsable del uso y protección de los datos personales bajo el presente aviso de privacidad.<br><br>



								Los datos personales que Abbott pudiera tratar son:<br>

								1. Nombre Completo de participante<br>

								2. Especialidad<br>

								3. País en el que labora<br>

								4. Dirección de correo electrónico <br><br>



								No se le solicitarán datos personales sensibles.<br><br>



								Finalidades del tratamiento:<br>

								1. Registro en la plataforma Web generada por Quimica International Services LLC,  en nombre de Abbott para su participación en el Lanzamiento Virtual POR UNA MENTE SIN LÍMITES, realizado en Julio de 2021.<br>

								2. Entrega de material educativo y promocional en la medida en que así lo permita la legislación aplicable a cada país participante.<br>

								3. Invitación a eventos científicos y educativos, registro y/o constancia de su participación y trámites para su asistencia.<br>

								4. Listas de asistencia a eventos científicos organizados por Abbott<br>

								5. Envío de información respecto a programas y productos de Abbott, por diversos medios, incluyendo, pero no limitado a, todas las  plataformas digitales existentes y por existir en el futuro<br>

								6. Capacitaciones de temas médicos y digitales<br>

								7. Remisión de sus datos a terceros contratados por Abbott limitado a las finalidades expresadas en el presente aviso<br><br>



								Abbott podrá contactarlo a través de los siguientes medios, sin limitar, visitas personales, llamadas telefónicas, correos electrónicos, enlaces virtuales mediante un dispositivo de comunicación, plataformas digitales de transmisión de eventos en vivo, sitios de internet, videollamadas, mensajes de texto y multimedia, servicio postal o mensajería, eventos, redes sociales, espacios publicitarios o comercializados en medios y plataformas digitales y medios impresos. Consulte nuestra Política de Privacidad completa en www.latam.abbott</p><br>

								<h5>TÉRMINOS Y CONDICIONES</h5>

								<p>Abbott Laboratorios Limitada podrá modificar los Términos y Condiciones del Sitio Web de tiempo en tiempo, para lo cual le informará a los usuarios del Sitio Web (los “Usuarios”) sobre las modificaciones a los Términos y Condiciones del Sitio Web con una anticipación razonable para que los Usuarios las conozcan y se familiaricen con ellas. Abbott Laboratorios Limitada, a través del Sitio Web, le pedirá a los Usuarios que acepten los nuevos Términos y Condiciones del Sitio Web.<br><br>



								Estos Términos y Condiciones se aplican a personas domiciliadas en Guatemala, El Salvador, Costa Rica, Panamá y República Dominicana. Aquellos Usuarios que decidan ingresar al Sitio Web desde otros países, lo harán bajo su propia iniciativa y es su responsabilidad el sujetarse a las leyes locales que sean aplicables. Cualquier reclamo en relación con el uso del Sitio y el material en él contenido está regulado por las leyes de Guatemala.<br><br>



								Su acceso al Sitio Web está sujeto a los siguientes Términos y Condiciones. Al acceder o utilizar el Sitio Web, usted acepta que ha leído, entendido y está de acuerdo en comprometerse con estos Términos y Condiciones, así como con los términos de nuestro Aviso de Privacidad, el cual podrá encontrar en www.porunamentesinlimites.com. El uso de este Sitio Web tras la publicación por nuestra parte de cualquier cambio a estos Términos y Condiciones constituye su aceptación de dichos cambios. Si no está de acuerdo con estos Términos y Condiciones o no está satisfecho con este Sitio Web, el único y exclusivo recurso que tiene es dejar de usar este Sitio Web.</p><br>

								<h5>REGISTRO DE USUARIO</h5>

								<p>El registro de los Usuarios en este Sitio Web constituye una condición indispensable para que los Usuarios reciban información personalizada en relación con los Productos y servicios de Abbott Laboratorios, Limitada, Abbott, S.A. de C.V., Abbott HealtCare Costa  Rica, Abbott Laboratories Internacional LLC en Panamá y Abbott Laboratories International LLC en República Dominicana a través del mismo. Al aceptar los Términos y Condiciones, cada Usuario entiende esta condición y acepta proporcionar información completa, verídica y exacta al registrarse y usar el Sitio Web.<br><br>



								Para poder recibir información personalizada, el Usuario deberá crear una cuenta ("Cuenta de Usuario") de conformidad con las condiciones señaladas en estos Términos y Condiciones del Sitio Web. Para la creación de la Cuenta de Usuario, el Usuario al ingresar sus datos, declara que los mismos corresponden a información veraz, completa y vigente. Para la creación de la Cuenta de Usuario, el Usuario deberá diligenciar la siguiente información: nombre completo (nombres y apellidos), especialidad , correo electrónico, país de procedencia. Esta información será tratada de conformidad con estos Términos y Condiciones del Sitio Web y el Aviso de Privacidad del evento Cumbre NASA que se encuentra disponible en www.quimicavirtualevents.com/cumbrenasa. De conformidad con el Aviso de Privacidad del evento Lanzamiento Virtual POR UNA MENTE SIN LÍMITES, ésta cumplirá con las leyes aplicables en materia de protección de datos, manteniendo los estándares de seguridad suficientes para impedir cualquier adulteración, pérdida, consulta, uso o acceso no autorizado o fraudulento, y garantizando los derechos de los titulares de los datos.<br><br>



								El Usuario acepta que no podrá crear una cuenta para alguien distinto al Usuario.<br>

								El registro de los Usuarios en el Sitio Web deberá ser realizado por mayores de edad exclusivamente.</p><br>

								<h5>SOBRE EL USO</h5>

								<p>Usted reconoce y acepta que:<br><br>



								a. Aunque nos esforzamos por ofrecer en este Sitio Web las últimas novedades relacionadas con nuestros Productos y servicios, y otro tipo de información acerca de nuestra compañía, no garantizamos la exactitud, la eficacia y la conveniencia del contenido informativo de este Sitio Web. Cada persona asume la responsabilidad total y todos los riesgos derivados del uso de este Sitio Web. La información se presenta "tal cual" y puede incluir imprecisiones técnicas o errores tipográficos. Abbott Laboratorios Limitada se reserva el derecho de hacer adiciones, supresiones o modificaciones en la información ofrecida en el Sitio Web en cualquier momento sin aviso previo.<br>

								Abbott Laboratorios Limitada no puede garantizar que el Sitio Web funcionará sin interrupciones o errores, pero tomará las acciones necesarias y realizará la debida diligencia, con el fin de ofrecer la mayor disponibilidad del Sitio Web y así corregir dentro de la brevedad posible, los errores, omisiones o inexactitudes.<br>

								b. HASTA EL MÁXIMO PERMITIDO POR LA LEY VIGENTE APLICABLE, ABBOTT LABORATORIOS, LIMITADA NO HACE DECLARACIONES NI GARANTÍAS DE NINGÚN TIPO O NATURALEZA CON RESPECTO A LA INFORMACIÓN O CONTENIDO PUBLICADO EN ESTE SITIO WEB. POR ESTE MEDIO, ABBOTT LABORATORIOS LIMITADA QUEDA EXENTO DE TODAS LAS DECLARACIONES Y GARANTÍAS, YA SEA EXPRESAS O IMPLÍCITAS, CREADAS POR LEY, CONTRATO U OTRO MEDIO, INCLUIDAS ENTRE OTRAS, TODAS LAS GARANTÍAS DE COMERCIALIZACIÓN, ADAPTACIÓN A UN PROPÓSITO ESPECÍFICO, TÍTULO O NO INFRACCIÓN. EN NINGÚN CASO, ABBOTT LABORATORIOS LIMITADA SERA RESPONSABLE POR DAÑOS DE CUALQUIER TIPO O NATURALEZA, INCLUIDOS ENTRE OTROS, DAÑOS DIRECTOS, INDIRECTOS, ESPECIALES (INCLUIDO LUCRO CESANTE) EMERGENTES O FORTUITOS EN RELACIÓN CON LA EXISTENCIA O USO DE ESTE SITIO WEB Y/O LA INFORMACIÓN O EL CONTENIDO PUBLICADO EN ESTE SITIO WEB, INDEPENDIENTEMENTE DE SI ABBOTT LABORATORIOS LIMITADA HA SIDO NOTIFICADO DE LA POSIBILIDAD DE DICHOS DAÑOS.<br>

								c. Hasta el máximo permitido por la ley vigente aplicable, Abbott Laboratorios Limitada no es responsable ni ofrece garantías de ningún tipo por la exactitud, la eficacia, la oportunidad y la conveniencia de la información o el contenido obtenido de terceros, incluidos los hipervínculos hacia o desde sitios de terceros. Salvo que se disponga lo contrario en este Sitio Web, Abbott Laboratorios, Limitada no editará, censurará, ni de otro modo controlará el contenido proporcionado por terceros en cualquier tablero de anuncios, sala de chat u otros foros similares publicados en el Sitio Web. Dicha información debe, por lo tanto, considerarse sospechosa y no recibe la aprobación de Abbott Laboratorios Limitada.<br>

								d. Este Sitio Web puede contener declaraciones proyectivas que reflejan las expectativas actuales de Abbott Laboratorios Limitada con respecto a eventos futuros y el desarrollo de negocios. Dichas declaraciones implican riesgos e incertidumbres. Los avances o resultados reales podrían diferir sustancialmente de los proyectados y dependen de una serie de factores, que incluyen el éxito de los programas de investigación en curso, los resultados de ensayos clínicos pendientes o futuros, la comercialización continua de sus Productos, las aprobaciones regulatorias de sus Productos, la validez y la vigencia de sus patentes, la estabilidad de sus relaciones comerciales y las condiciones económicas en general, entre otros. Abbott Laboratorios Limitada tiene la intención de actualizar este Sitio Web de forma periódica, pero no asume ninguna obligación de actualizar los contenidos.</p>

								<h5>DESCARGOS DE RESPONSABILIDAD</h5>

								<p>Usted entiende, reconoce y acepta lo siguiente:<br><br>



								a. Si usa este Sitio Web, usted acepta no interrumpir ni interceptar la información electrónica publicada en este Sitio Web o en cualquiera de nuestros servidores. También acepta no intentar evadir ninguna de las características de seguridad de nuestro Sitio Web, y se compromete a respetar todas las leyes, normas y reglamentos locales e internacionales aplicables.<br>

								b. Usted otorga a Abbott Laboratorios Limitada el derecho de usar todo el contenido que usted cargue o que transmita de alguna otra manera a este Sitio Web, sujeto a estos Términos y Condiciones y a el Aviso de Privacidad del evento POR UNA MENTE SIN LÍMITES.<br>

								c. Salvo que Abbott Laboratorios Limitada lo indique y acuerde expresamente con antelación, no se establecerá ninguna relación confidencial en el caso de que algún usuario de este Sitio Web deba hacer cualquier comunicación oral, escrita o electrónica a Abbott Laboratorios Limitada (como por ejemplo comentarios, preguntas, observaciones, sugerencias, ideas, etc.). Si alguno de los Sitios Web de Abbott Laboratorios Limitada requiere o solicita que se proporcione dicha información y que esta contenga datos personales (por ejemplo, nombre, dirección, número de teléfono, etc), Abbott Laboratorios Limitada la obtendrá, la usará y mantendrá de manera coherente con su Aviso de Privacidad y observando la normatividad aplicable en materia de protección de datos. Respecto de las comunicaciones orales, escritas o electrónicas que no contengan datos personales, Abbott laboratorios Limitada tendrá libertad para reproducir, publicar o bien utilizar dicha información para cualquier propósito, como investigación, desarrollo, fabricación, uso o venta de productos que incorporen dicha información. El remitente de cualquier información a Abbott Laboratorios Limitada es totalmente responsable de su contenido, incluidas su veracidad y exactitud y la no violación por su parte de los derechos de propiedad o privacidad de cualquier otra persona. En todo caso, Abbott Laboratorios Limitada no responderá bajo ninguna circunstancia de la información o contenidos que se incluyan en secciones públicas de este Sitio Web, a las cuales cualquier tercero pueda acceder y, en dicho sentido, conocer la información o contenidos que se publiquen en los mismos. <br>

								d. Al aceptar los Términos y Condiciones del Sitio Web, el Usuario declara y se compromete a que no realizará, ni intentará o ayudará a otra persona a realizar la violación de los Términos y Condiciones del Sitio Web.<br>

								e. El Usuario declara que se abstendrá de utilizar el Sitio Web para:<br><br>



								1. Cargar, descargar, enviar, transmitir o almacenar contenido que sea ilícito, fraudulento, falso, perjudicial, doloso, calumnioso, difamatorio, abusivo, violento, obsceno, vulgar, invasivo de la privacidad de ajenos, ofensivo de carácter racial o étnico, o de otra manera censurable.<br>

								2. Participar en cualquier violación de los derechos de autor u otra violación de propiedad intelectual, o revelar cualquier secreto industrial o información confidencial por lo que se incumple un contrato de confidencialidad, de empleo o de no divulgación.<br>

								3. Cargar, publicar, almacenar o de otra manera introducir o subir al Sitio Web cualquier material que contenga virus o cualquier otro código, archivo o programas de computadora con la intención de dañar, interferir con o limitar la operación habitual del Sitio Web.<br>

								4. Interferir o interrumpir el funcionamiento del Sitio Web (por medio de cualquier método deliberado o automatizado).<br>

								5. Intentar o realizar cualquier actividad ilícita a través del Sitio Web.</p><br>

								<h5>CONTENIDO DEL SITIO WEB</h5>

								<p>El contenido del Sitio Web no debe usarse para determinar el tratamiento de ningún tipo de afección, enfermedad o similares.<br><br>



								Este Sitio Web, la información y los recursos relacionados con la salud no tienen como objetivo ni deben interpretarse como asesoramiento o la prestación de servicios médicos, de enfermería o de cuidado de la salud profesional ni como la práctica de la medicina, la enfermería o el cuidado de la salud profesional.<br><br>



								Salvo que Abbott Laboratorios Limitada lo indique y acuerde expresamente con antelación, ningún director, empleado, agente o representante de Abbott Laboratorios Limitada, se dedica a proporcionar asesoramiento, diagnóstico o tratamiento médico ni otros servicios médicos que de alguna manera creen una relación médico-paciente a través de este Sitio Web.<br><br>



								El Usuario declara que verificará la información del Producto (incluso los prospectos del empaque) con respecto a dosificación, precauciones, advertencias, interacciones y contraindicaciones antes de consumir o usar cualquier Producto al que se haga referencia en el Sitio Web.</p><br>

								<h5>PROPIEDAD INTELECTUAL</h5>

								<p>La información, los documentos y los gráficos relacionados publicados en este Sitio Web (la "Información") son propiedad exclusiva de Abbott Laboratorios Limitada, con excepción de la información que proporcionan terceros proveedores contratados por Abbott Laboratorios Limitada  Se concede permiso para usar la información, siempre que (1) el aviso de derechos de autor aparezca en todas las copias; (2) el uso de la Información sea solo para uso informativo y no comercial o personal; (3) no se modifique la Información de ninguna manera; y (4) ningún gráfico disponible en este Sitio Web se utilice separadamente del texto que lo acompaña. <br>Abbott Laboratorios Limitada no es responsable de los contenidos que proporcionan terceros proveedores, y queda prohibida la distribución de este material sin el permiso del propietario de los derechos de autor de los mismos. Con excepción de lo permitido anteriormente, no se concede ninguna licencia o derecho, expreso o implícito, a ninguna persona bajo ninguna patente, marca registrada u otro derecho de propiedad de Abbott Laboratorios Limitada.<br><br>



								No se podrá hacer uso de ninguna marca comercial registrada, nombres comerciales, imagen comercial ni productos de Abbott Laboratorios Limitada en este Sitio Web sin la previa autorización por escrito de esta última, excepto para identificar los productos o servicios de la compañía.</p><br>

								<h5>PRIVACIDAD Y SEGURIDAD</h5>

								<p>Abbott Laboratorios Limitada se compromete a proteger su privacidad en línea. Somos conscientes de la importancia de la privacidad para los clientes y visitantes de nuestro Sitio Web. El uso que damos a la información de identificación personal se rige por nuestro Aviso de Privacidad, y al acceder y usar nuestro Sitio Web, usted acepta que quedará limitado por dicho Aviso.</p><br>

								<h5>LIMITACIÓN DE RESPONSABILIDAD</h5>

								<p>Abbott laboratorios Limitada no asume ninguna responsabilidad por los materiales, la información ni las opiniones proporcionadas, publicadas o, de otro modo, disponibles a través de este Sitio Web. La confianza en estos materiales, información y opiniones corre bajo su propio riesgo. Abbott Laboratorios Limitada declina toda responsabilidad por lesiones o daños que resulten del uso de este Sitio Web o el contenido del mismo.<br><br>



								ESTE SITIO WEB DE ABBOTT LABORATORIOS LIMITADA, EL CONTENIDO DEL SITIO Y LOS PRODUCTOS Y SERVICIOS QUE OFRECE O QUE ESTÁN DISPONIBLES A TRAVÉS DE ESTE SITIO WEB SE OFRECEN "TAL CUAL" Y "SEGÚN DISPONIBILIDAD", CON TODOS SUS DEFECTOS. EN NINGÚN CASO ABBOTT LABORATORIOS LIMIADA SUS PROVEEDORES O SUS RESPECTIVOS DIRECTORES, EMPLEADOS O AGENTES (EN LO SUCESIVO LAS "PARTES DE ABBOTT LABORATORIOS LIMITADA ") SERÁN RESPONSABLES DE DAÑOS DE NINGÚN TIPO, BAJO NINGUNA TEORÍA LEGAL, DERIVADOS DE O EN RELACIÓN CON EL USO QUE USTED HAGA, O SU IMPOSIBILIDAD DE HACERLO, DE ESTE SITIO WEB, EL CONTENIDO DEL SITIO, LOS SERVICIOS PRESTADOS EN O A TRAVÉS DE ESTE SITIO WEB O CUALQUIER SITIO VINCULADO, INCLUIDOS DAÑOS ESPECIALES, INDIRECTOS, PUNITIVOS, INCIDENTALES, EJEMPLARES O DERIVADOS, ENTRE ELLOS LESIONES PERSONALES, LUCRO CESANTE O DAÑO COMO RESULTADO DE DEMORA, INTERRUPCIÓN EN EL SERVICIO, VIRUS, ELIMINACIÓN DE ARCHIVOS O COMUNICACIONES ELECTRÓNICAS, O ERRORES, OMISIONES U OTRAS INEXACTITUDES EN ESTE SITIO WEB O EL CONTENIDO DEL SITIO, EXISTIENDO O NO NEGLIGENCIA POR PARTE ABBOTT LABORATORIOS LIMITADA Y HAYA SIDO O NO ABBOTT LABORATORIOS LIMITADA NOTIFICADO DE LA POSIBILIDAD DE DICHOS DAÑOS.</p><br>

								<h5>RESPONSABILIDAD DE USUARIO</h5>

								<p>Al ingresar a este Sitio Web, usted adquiere el compromiso de suministrar información personal correcta y verdadera, así como proceder a la actualización de sus datos cada vez que se requiera. Se le prohíbe poner en, o transmitir a, o desde este sitio web, cualquier material ilegal, amenazador, calumniador, difamatorio, obsceno, escandaloso, pornográfico o profano, o cualquier otro material que pudiera dar lugar a cualquier responsabilidad civil o penal en los términos de la ley.<br><br>



								Usted acepta no utilizar ningún dispositivo, software, rutina ni datos para obstruir o intentar obstruir el funcionamiento correcto de este Sitio Web o toda actividad realizada en este Sitio Web. Además, acepta no utilizar ni intentar utilizar ningún motor, software, herramienta, agente, datos u otro dispositivo o mecanismo (incluidos, entre otros, exploradores, arañas, robots, personajes digitales o agentes inteligentes) para navegar o buscar en este Sitio Web, que no sea el motor de búsqueda o los agentes de búsqueda brindados por Abbott Laboratorios Limitada o los exploradores en general disponibles para el público.</p>

								<h5>INDEPENDENCIA DE DISPOSICIONES</h5>

								<p>En caso de que una o más de las disposiciones contenidas en los presentes Términos y Condiciones sean consideradas nulas, ilegales o ineficaces en cualquier aspecto, la validez, legalidad y exigibilidad o eficacia del resto de las disposiciones del presente documento no se verán afectadas o anuladas por dicha circunstancia.</p>

								<h5>General</h5>

								<p>Al hacer clic en acepto, el Usuario declara que acepta que estos Términos y Condiciones del Sitio Web describen el acuerdo completo entre el Usuario y Abbott Laboratorios Limitada  Este Sitio Web fue creado y es operado bajo las leyes de Guatemala. Las leyes de Guatemala controlarán los términos y condiciones previstos en estos Términos y Condiciones del Sitio Web, sin dar efecto a ningún principio de conflicto de leyes. Si una autoridad competente considera que alguna disposición de estos Términos y Condiciones del Sitio Web es inválida o no aplicable, usted acepta que las demás disposiciones de estos Términos y Condiciones del Sitio Web permanecerán en plena vigencia y efecto.</p>



								<button  @click="irAlPaso(4)" class="btn btn-primary ml-auto mr-auto d-table mt-4 mb-3">Proceder al registro</button>

							</div>

						</div>

						

					</div>

				</div>

			</div>    
  </template>
  <template v-else-if="paso === 4">  
			<div class="container container-general">

				<div class="row ">

					

					<div class="col-md-8 title">

						<p class="text-top"><span class="text-02">LANZAMIENTO VIRTUAL</span></p>

						<h1>Por una mente sin límites</h1>

						<h2>La correcta nutrición desde el inicio, marca la diferencia</h2>

					</div>



					<div class="col-md-4">

						<a class="logo"><img src="public/assets/mentesinlimites/img/logo.png"></a>

					</div>

				</div>

			</div>

			<div class="container">

				<div class="row ">

					<div class="col-12 margin-top-section">

						<h2 class="title-section">Registro</h2>

					</div>

					<div class="col-12 mt-2 mb-2">

						<form>

							<div class="form-row margin-row-bottom">

							    <div class="col-md-12">	

                    <input type="text" class="form-control" id="nombre" placeholder="Nombre completo" v-model="registro.form.nombre" autocomplete="false">

							        <div class="invalid-feedback">

							          Ingrese un nombre y apellido.

							        </div>

							    </div>

						    </div>

						    <div class="form-row margin-row-bottom">

							    <div class="col-md-12">	

							    	<input type="text" class="form-control" id="mail" placeholder="Correo electrónico"  v-model="registro.form.email" autocomplete="false">

							        <div class="invalid-feedback">

							          Ingrese nacionalidad.

							        </div>

							    </div>

						    </div>

						    <div class="form-row margin-row-bottom">

							    <div class="col-md-12">	

							    	<input type="text" class="form-control" id="mail" placeholder="Especialidad"  v-model="registro.form.especialidad" autocomplete="false">

							        <div class="invalid-feedback">

							          Ingrese especialidad.

							        </div>

							    </div>

						    </div>



						    <div class="form-row margin-row-bottom">

							    <div class="col-md-12">	

							    	<input type="text" class="form-control" id="mail" placeholder="País"  v-model="registro.form.pais" autocomplete="false">

							        <div class="invalid-feedback">

							          Ingrese país.

							        </div>

							    </div>

						    </div>



						    <div class="form-row margin-row-bottom">

							    <div class="col-md-12">	

							    	<button class="btn btn-primary ml-auto mr-auto d-table  mt-2" type="button" @click="registrar()" :disabled="registro.enviando">Ingresar</button>

							    </div>

						    </div>

						</form>

					</div>

				</div>

			</div>
  </template>
  <template v-else>
			<div class="container container-general">

				<div class="row ">

					

					<div class="col-md-8 title order-2 order-md-1">

						<p class="text-top"><span class="text-02">LANZAMIENTO VIRTUAL</span></p>

						<h1>Por una mente sin límites</h1>

						<h2>La correcta nutrición desde el inicio, marca la diferencia</h2>

					</div>



					<div class="col-md-4 order-1 order-md-2">

						<a class="logo"><img src="public/assets/mentesinlimites/img/logo.png"></a>

					</div>

				</div>

			</div>

			<div class="container container-general">

				<div class="row ">

					<div class="col-12 mensaje-full">

						<div class="inner">

							<h2 class="title-section">MUCHAS GRACIAS POR INSCRIBIRTE</h2>

							<h3 class="subtitle-section">TE ESPERAMOS EL <span>14 DE JULIO</span> A LAS <span>7:00 PM</span></h3>

								<div class="line-separate"></div>

						</div>

						

					</div>

				</div>

			</div>    
  </template>
</div>
</template>
<script>


export default {
        props : {
            keyRecaptcha: {
                type: String
            },
            urlRegistrar: {
                type: String,
                required: true
            },
            urlRedirect: {
                type: String,
                required: true
            },
            urlAvisoPrivacidad: {
                type: String,
                required: true
            }                           
        },
        data () {
            return {
                vista: 'registro',
                paso: 1,
                aviso: 'general',
                aceptoGeneral: false,
                registro: {
                    form: {
                        nombre: null,
                        apellido: null,
                        email: null,
                        pais: null,
                        institucion: null,
                        ciudad: null,
                        especialidad: null,
                        password: null,
                        adicional: {
                        }
                    },
                    enviado: false,
                    enviando: false
                },
                info: {
                    countries: ['Costa Rica','El Salvador','Guatemala','Honduras','Nicaragua','Panamá','República Dominicana','Otro']
                },
                errors: [],
            }
        },
        mounted () {
            console.debug('Registro mounted');
            $('body').addClass('home');
            //$('#container-gral').addClass('home');
            
        },
        methods: {

            checkForm: function () {
                let vm = this;
                let form = vm.registro.form;
                let errors = [];
                let camposSimples = {
                  nombre: 'nombre',
                  email: 'corréo electrónico',
                  especialidad: 'especialidad',
                  pais: 'país',
                  
                };
                let camposAdicionales = {
                };

                _.forEach(camposSimples, function(campo,key) {
                  if (!form[key]) {
                    errors.push('El campo ' + campo + ' es obligatorio.');
                  }
                });

                _.forEach(camposAdicionales, function(campo,key) {
                  if (!form.adicional[key]) {
                    errors.push('El campo ' + campo + ' es obligatorio.');
                  }
                });

                if (errors.length > 0) {
                  alert(errors[0]);
                  return false;
                }

                return true;
                
            },            
            registrar () {
                //e.preventDefault();
                let vm = this
                let form = this.registro.form;
                if (form.enviando) {
                    return false;
                }
                if (this.checkForm()) {
                    form.enviando = true;
                    grecaptcha.ready(function() {
                        grecaptcha.execute(vm.keyRecaptcha, {action: 'submit'}).then(function(token) {
                            // Add your logic to submit to your backend server here.
                            if (token) {
                                axios.post(vm.urlRegistrar, form)
                                    .then(response => {
                                        console.debug(response);
                                        form.enviando = false;
                                        
                                        document.location = vm.urlRedirect;
                                    }, error => {
                                        form.enviando = false;
                                        console.debug(error.response.data.message);
                                        alert(error.response.data.message);

                                    });

                            }

                        });
                    });
                }
                
            },
            irAlPaso: function (paso) {
              window.scrollTo(0, 0);
              
              if (paso === 2) {
                $('body').removeClass('home');  
                $('body').addClass('general').addClass('registro');
                //$('#container-gral').addClass('container-general');
              }
              this.paso = paso;
            },
            mostrarAvisoPais: function (pais) {
              window.scrollTo(0, 0);
              this.aviso = 'pais';
              this.avisoPaisSeleccionado = _.find(this.avisoPaises, function(item) {
                return item.key === pais;
              });
            }
        }
    }
</script>
<style scoped>
.list-group-item-action {
  cursor: pointer;
}
</style>