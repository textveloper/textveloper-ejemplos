import json
import re
import urllib
import urllib2

# Enviar SMS


class Textveloper:

    def __init__(self, cuenta_token, aplicacion_token):
        self.cuenta_token = cuenta_token
        self.aplicacion_token = aplicacion_token

    def enviar_sms(self,telefono, mensaje):

        try:
            url = "https://api.textveloper.com/sms/enviar/"

            # Web Hook Data Parameters
            data = urllib.urlencode({'telefono': str(telefono),
                                     'mensaje': str(mensaje),
                                     'aplicacion_token': str(self.aplicacion_token),
                                     'cuenta_token': str(self.cuenta_token)})

            request_url = urllib2.Request(url, data)
            handler = urllib2.urlopen(request_url)
            response = json.loads(handler.read())

            if response['respuesta'] == 'ok':
                print "Mensaje Enviado al telefono: " + telefono

            else:
                print "Mensaje No enviado, Error: " + response['detalle']

        except urllib2.HTTPError, e:

            print e
            
            
# Uso de la Clase
cuenta_token = "__TU_CUENTA_TOKEN__"
aplicacion_token = "__TU_APLICACION_TOKEN__"
telefono_destino = "0412345678"
# Iniciar Clase
textveloper_api = Textveloper(cuenta_token, aplicacion_token)
# Enviar SMS
textveloper_api.enviar_sms(telefono_destino, "hola de nuevo")
