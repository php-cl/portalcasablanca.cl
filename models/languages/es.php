<?php
	/*
		UserCake Language File.
		Language: Spanish.
		Author: Leonardo Diez
	*/
	
	/*
		%m1% - Dymamic markers which are replaced at run time by the relevant index.
	*/

	$lang = array();
	
	//Account
	$lang = array_merge($lang,array(
		"ACCOUNT_SPECIFY_USERNAME" 		=> "Por favor introduce tu nombre de usuario",
		"ACCOUNT_SPECIFY_PASSWORD" 		=> "Por favor introduce tu clave",
		"ACCOUNT_SPECIFY_EMAIL"			=> "Por favor introduce tu dirección de correo electrónico",
		"ACCOUNT_INVALID_EMAIL"			=> "La dirección de correo electrónico es incorrecta",
		"ACCOUNT_INVALID_USERNAME"		=> "El nombre de usuario no es correcto",
		"ACCOUNT_USER_OR_EMAIL_INVALID"         => "El nombre de usuario o la dirección de correo electrónico no son correctos",
		"ACCOUNT_USER_OR_PASS_INVALID"          => "El nombre de usuario o la clave no son correctos",
		"ACCOUNT_ALREADY_ACTIVE"		=> "Tu cuenta ya ha sido activada",
		"ACCOUNT_INACTIVE"			=> "Tu cuenta no ha sido activada aún. Verifica tu cuenta de correo electrónico, incluyendo la carpeta de correo basura, para encontrar las instrucciones de activación.",
		"ACCOUNT_USER_CHAR_LIMIT"		=> "Tu nombre de usuario debe tener entre %m1% y %m2% caracteres de largo",
		"ACCOUNT_PASS_CHAR_LIMIT"		=> "Tu clave debe tener entre %m1% y %m2% caracteres de largo",
		"ACCOUNT_PASS_MISMATCH"			=> "La clave debe coincidir con la confirmación",
		"ACCOUNT_USERNAME_IN_USE"		=> "El nombre de usuario %m1% ya está siendo utilizado",
		"ACCOUNT_EMAIL_IN_USE"			=> "La dirección de correo electrónico %m1% ya está siendo utilizada",
                "ACCOUNT_MUST_ACCEPT_CONDITIONS"        => "Debes leer y aceptar nuestros términos de uso y política de privacidad",
		"ACCOUNT_LINK_ALREADY_SENT"		=> "Ya hemos enviado un correo electrónico a esta cuenta en las últimas %m1% horas",
		"ACCOUNT_NEW_ACTIVATION_SENT"           => "Hemos enviado un enlace para activar la cuenta a tu correo electrónico, por favor revisa tu bandeja de entrada",
            	"ACCOUNT_NOW_ACTIVE"			=> "Has activado tu cuenta. Utiliza tu nombre de usuario y clave para utilizarla.",
		"ACCOUNT_SPECIFY_NEW_PASSWORD"          => "Por favor, introduce la nueva clave",
		"ACCOUNT_NEW_PASSWORD_LENGTH"           => "La nueva clave debe tener entre %m1% y %m2% caracteres de largo",
		"ACCOUNT_PASSWORD_INVALID"		=> "La clave actual no es correcta",
		"ACCOUNT_EMAIL_TAKEN"			=> "Ya existe un usuario que utiliza esa dirección de correo electrónico",
		"ACCOUNT_DETAILS_UPDATED"		=> "Los detalles de tu cuenta han sido actualizados.",
		"ACTIVATION_MESSAGE"			=> "Debes activar tu cuenta antes de intentar acceder. Sigue el siguiente enlace para hacerlo.\n\n%m1%?nuevo=%m2%",
		"ACCOUNT_REGISTRATION_COMPLETE_TYPE1"	=> "El registro se ha completado con éxito.",
		"ACCOUNT_REGISTRATION_COMPLETE_TYPE2"	=> "El registro se ha completado con éxito. Pronto recibirás un correo electrónico con las instrucciones para activar tu cuenta.",
	));

        //Twitter and Facebook
        $lang = array_merge($lang,array(
            "TWITTER_INVALID_PROCESS" => "La comunicación con Twitter ha fallado. Por favor, comienza el proceso nuevamente.",
            "TWITTER_DENIED_PROCESS" => "Debes dar permisos a cos.as para que acceda a tu información en Twitter.",
            "TWITTER_SUCCESFULL_LOGIN" => "La cuenta de Twitter se ha asociado con su usuario de cos.as con éxito.",
            "FACEBOOK_INVALID_PROCESS" => "La comunicación con Facebook ha fallado. Por favor, comienza el proceso nuevamente.",
            "FACEBOOK_DENIED_PROCESS" => "Debes dar permisos a cos.as para que acceda a tu información en Facebook.",
            "FACEBOOK_SUCCESFULL_LOGIN" => "La cuenta de Facebook se ha asociado con su usuario de cos.as con éxito.",
        ));
        
	//Forgot Password
	$lang = array_merge($lang,array(
		"FORGOTPASS_INVALID_TOKEN"		=> "La petición de recuperar clave ya ha sido procesada.",
		"FORGOTPASS_NEW_PASS_EMAIL"		=> "Te hemos enviado un correo electrónico con una nueva clave para acceder a tu cuenta.",
		"FORGOTPASS_REQUEST_CANNED"		=> "La petición de recuperar clave ha sida cancelada.",
		"FORGOTPASS_REQUEST_EXISTS"		=> "Ya se ha realizado una petición para recuperar la clave de esta cuenta",
		"FORGOTPASS_REQUEST_SUCCESS"            => "Te hemos enviado un correo electrónico con instrucciones para recuperar el acceso a tu cuenta.",
	));

        //Contact form
	$lang = array_merge($lang,array(
		"CONTACT_SPECIFY_EMAIL"			=> "Por favor introduce una dirección de correo electrónico de contacto",
		"CONTACT_INVALID_EMAIL"			=> "La dirección de correo electrónico es incorrecta",
                "CONTACT_SPECIFY_SUBJECT" 		=> "Por favor introduce un asunto para tu mensaje",
                "CONTACT_SPECIFY_MESSAGE" 		=> "Por favor introduce un mensaje",
                "CONTACT_SENT"                          => "El mensaje ha sido enviado.",
	));

        //Votes and comments
        $lang = array_merge($lang,array(
    		"REPORT_ERROR"                          => "Ha ocurrido un error al enviar el informe. Por favor, inténtalo nuevamente.",
    		"REPORT_SENT"                           => "El informe ha sido enviado.",
    		"VOTE_ERROR"                            => "Ha ocurrido un error al marcar el enlace. Por favor, inténtalo nuevamente.",
        ));
        
	//Miscellaneous
	$lang = array_merge($lang,array(
		"CONFIRM"				=> "Confirmar",
		"DENY"					=> "Rechazar",
		"SUCCESS"				=> "Éxito",
		"ERROR"					=> "Error",
		"NOTHING_TO_UPDATE"			=> "No hay nada para actualizar",
		"SQL_ERROR"				=> "Ha ocurrido un error al acceder a los datos",
		"MAIL_ERROR"				=> "Ha ocurrido un error al enviar un correo electrónico",
		"MAIL_TEMPLATE_BUILD_ERROR"             => "Ha ocurrido un error al construir el mensaje",
		"MAIL_TEMPLATE_DIRECTORY_ERROR"         => "Unable to open mail-templates directory. Perhaps try setting the mail directory to %m1%",
		"MAIL_TEMPLATE_FILE_EMPTY"              => "Template file is empty... nothing to send",
		"FEATURE_DISABLED"			=> "Esta funcionalidad esta deshabilitada",
	));
?>