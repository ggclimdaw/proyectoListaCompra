<?php 

function startSession()
{
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
}

function closeSession()
{
    session_unset();
    session_destroy();
}

function getUserSession()
{
    if (isset($_SESSION['user.name']) && isset($_SESSION['user.username']) && isset($_SESSION['user.address']) 
    && isset($_SESSION['user.email']) && isset($_SESSION['user.avatarImage'])) {
        return new User(
            ($_SESSION['user.name']),
            ($_SESSION['user.username']),
            '',
            ($_SESSION['user.address']),
            ($_SESSION['user.email']),
            ($_SESSION['user.avatarImage']),
            ($_SESSION['user.id'])
        );
    } else {
        return null;
    }
}

function setUserSession(User $user)
{
    $_SESSION['user.name'] = $user->getName();
    $_SESSION['user.username'] = $user->getUsername();
    $_SESSION['user.email'] = $user->getEmail();
    $_SESSION['user.address'] = $user->getAddress();
    $_SESSION['user.avatarImage'] = $user->getAvatarImage();
    $_SESSION['user.id'] = $user->getId();
}

function unsetUserSession()
{
    unset($_SESSION['user.id']);
    unset($_SESSION['user.name']);
    unset($_SESSION['user.username']);
    unset($_SESSION['user.email']);
    unset($_SESSION['user.address']);
    unset($_SESSION['user.avatarImage']);
}

function getSessionVariable(string $variableName)
{
    return isset($_SESSION[$variableName]) ? $_SESSION[$variableName] : null;
}

function setSessionVariable(string $variableName, $value)
{
    $_SESSION[$variableName] = $value;
}

function unsetSessionVariable(string $variableName)
{
    unset($_SESSION[$variableName]);
}



    // CODIC DE TRADUCCIONS DELS IDIOMES...
function setLanguageSession(string $language = '')
{
    if ($language == null) $language = constant('DEFAULT_LANGUAGE');
    $_SESSION['language'] = $language;

    $fileTraslationPath = "traslations/" . $language . ".json";
    $stringFileContents = file_get_contents($fileTraslationPath);

    if ($stringFileContents === false) {
        echo "Error al leer el fichero de traducciones para el idioma " . $language;
    }

    $decodedJson = json_decode($stringFileContents, true);
    if ($decodedJson === null) {
        echo "Error al decodificar el fichero de traduciones para el idioma " . $language;
    }

    $traslationsArray =[];
    foreach ($decodedJson as $traslationKey => $traslationValue) {
        $traslationsArray[$traslationKey] = $traslationValue;
    }

    $_SESSION['traslationsArray'] = $traslationsArray;

}

function getLanguageSession()
{
    $languageSession = $_SESSION['language'];
    if ($languageSession == null) $languageSession = setLanguageSession(constant('DEFAULT_LANGUAGE'));
    return $languageSession;
}

function getTraslationValue(string $traslationKey)
{
    $traslationString = "NO_EXISTE_TRADUCCIÓN";
    if (isset($_SESSION) && array_key_exists('traslationsArray', $_SESSION) && array_key_exists($traslationKey, $_SESSION['traslationsArray'])) {
        $traslationString = $_SESSION['traslationsArray'][$traslationKey];
    } else {
        startSession();
        setLanguageSession();
    }

    if ($traslationString == null) $traslationString = "NO_EXISTE_TRADUCCIÓN";
    return $traslationString;
}
    // FINS ACÍ CODIC DE TRADUCCIONS DEL IDIOMES
