import json
import re
import urllib
import urllib2

# Enviar SMS


def EnviarSMS(aplicacion_token, cuenta_token, telefono, mensaje):

    try:
        url = "http://api.poralquilar.com/sms/enviar/"

        # Web Hook Data Parameters
        data = urllib.urlencode({'telefono': str(telefono),
                                 'mensaje': str(mensaje),
                                 'aplicacion_token': str(aplicacion_token),
                                 'cuenta_token': str(cuenta_token)})

        request_url = urllib2.Request(url, data)
        handler = urllib2.urlopen(request_url)
        response = json.loads(handler.read())

        if response['respuesta'] == 'ok':
            print "Mensaje Enviado al telefono: " + telefono

        else:
            print "Mensaje No enviado, Error: " + response['detalle']

    except urllib2.HTTPError, e:

        print e
