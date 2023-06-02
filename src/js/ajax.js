//------------------------------------------------------------------------------
//--- ajaxRequest --------------------------------------------------------------
//------------------------------------------------------------------------------
// Perform an Ajax request.
// \param type The type of the request (GET, DELETE, POST, PUT).
// \param url The url with the data.
// \param callback The callback to call where the request is successful.
// \param data The data associated with the request.
function ajaxRequest(type,url,callback,data=null){
  var xhr=new XMLHttpRequest();
  if (type==='GET' && data!=null){
    url+='?'+data;
  }
  xhr.open(type,url);
  xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');

  xhr.onload=function(){
    switch (xhr.status){
      case 200:
      case 201:
        callback(JSON.parse(xhr.responseText));
        break;
      default:
        httpErrors(xhr.status);
    }
  };

  xhr.send(data);
}

//------------------------------------------------------------------------------
//--- httpErrors ---------------------------------------------------------------
//------------------------------------------------------------------------------
// Display an error message accordingly to an error code.
// \param errorCode The error code (HTTP status for example).
function httpErrors(errorCode)
{
  let messages = {
    400: 'Requête incorrecte',
    401: 'Authentifiez vous',
    403: 'Accès refusé',
    404: 'Page non trouvée',
    500: 'Erreur interne du serveur',
    503: 'Service indisponible'
  };

  // Display error.
  if (errorCode in messages)
  {
    $('#errors').html('<strong>' + messages[errorCode] + '</strong>');
    $('#errors').show();
    setTimeout(() =>
    {
      $('#errors').hide();
    }, 5000);
  }
}
