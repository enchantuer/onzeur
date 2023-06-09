//------------------------------------------------------------------------------
//--- ajaxRequest --------------------------------------------------------------
//------------------------------------------------------------------------------
// Perform an Ajax request.
// \param type The type of the request (GET, DELETE, POST, PUT).
// \param url The url with the data.
// \param callback The callback to call where the request is successful.
// \param data The data associated with the request.
function ajaxRequest(type,url,callback,data=null){
  const xhr=new XMLHttpRequest();
  if ((type==='GET' || type==='DELETE') && data!=null){
    url+='?'+data;
  }
  xhr.open(type,url);
  xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');  xhr.onload=function(){
    switch (xhr.status){
      case 200:
      case 201:
        callback(JSON.parse(xhr.responseText));
        break;
      default:
        httpErrors(/*xhr.status*/xhr.responseText);
        callback(xhr.status);
    }
  };

  xhr.send(data);
}

//------------------------------------------------------------------------------
//--- httpErrors ---------------------------------------------------------------
//------------------------------------------------------------------------------
// Display an error message accordingly to an error code.
// \param errorCode The error code (HTTP status for example).
function httpErrors(/*errorCode*/text)
{
  // let messages = {
  //   400: 'Requête incorrecte',
  //   401: 'Authentifiez vous',
  //   403: 'Accès refusé',
  //   404: 'Page non trouvée',
  //   500: 'Erreur interne du serveur',
  //   503: 'Service indisponible'
  // };

  const errorElement=document.getElementById('errors');
  errorElement.innerText = text;
  errorElement.style.display='block';
  // if(errorCode in messages){
  //   errorElement.innerHTML='<strong>'+messages[errorCode]+'</strong>';
  //   errorElement.style.display='block';
    // setTimeout(function(){
    //   errorElement.style.display='none';
    // },5000);
  // }
}
