# Plataforma-iot

Peticiones curl para el dispotivo HTCC-AB01

## Funcionamiento:

Se realizan peticiones curl-php al Gateway UG87 con el fin de obtener: Apps registradas, dispositivos registrados, consultar los mensajes tipo uplink que envia el dispositivo, enviar/consultar/eliminar mensajes tipo downlink.

El archivo Devices.php, permite evidenciar los mensajes tipo uplink que envia el dispositivo HTCC-AB01 en tiempo real. Con esto se puede acceder a la información enviada por el módulo para poder decodificarla, manipularla y representarla mediante una aplicación web:

![imagen](https://user-images.githubusercontent.com/86784944/130621384-9f82d679-8497-4263-97d7-eca305a2ce0b.png)

El módulo está programado en Arduino. Se configuró el dispositivo para enviar mensajes tipo uplink cada 15 segundos y controlar de forma remota el accionar de una valvula motorizada/contactor eléctrico para suspensión/reconexión de servicios públicos de agua y energía, respectivamente. Debido a que es un dispositivo clase A, después de enviar cada mensaje tipo uplink, se abre una ventana de recepción de unos pocos segundos, lo cual permitira recibir comandos mendiante mensajes tipo downlink. 

El dato enviado (uplink) por el módulo es: TmE8SwHsAQ==. En este dato se muestran un código asignado desde la programación del módulo en Arduino (Código: 12345678), nivel de batería y estado (0 o 1). Este dato está en Base64 y se debe decodificar. En TTN se muestra el dato decodificado, convirtiendo el dato Base64 a Hexadecimal:

![imagen](https://user-images.githubusercontent.com/86784944/130625859-4d0af975-ed22-496a-9d98-8b4685b6087c.png)

En TTN, el decodificador usado para convertir el dato Hexadecimal a tipo float se realiza usando el siguiente decoder en JavaScript:

function bytesToFloat(by) {
   var bits = by[3]<<24 | by[2]<<16 | by[1]<<8 | by[0];
   var sign = (bits>>>31 === 0) ? 1.0 : -1.0;
   var e = bits>>>23 & 0xff;
   var m = (e === 0) ? (bits & 0x7fffff)<<1 : (bits & 0x7fffff) | 0x800000;
   var f = sign * m * Math.pow(2, e - 150);
   return f;
} 
 
function Decoder(bytes, port) {

   var decoded = {};
   i = 0;

  decoded.Codigo = bytesToFloat(bytes.slice(i,i+=4));
  decoded.Bateria = ((bytes[i++] << 8) | bytes[i++]);
  decoded.Estado =  bytes[i++]
  return decoded;
}

## Pruebas:

Pruebas iniciales de creación de la plataforma LoRaWAN con ayuda de Laravel:

![imagen](https://user-images.githubusercontent.com/86784944/132098630-73851648-1d72-41e4-88a9-b90b7113b614.png)

## Motivación:

Se creó este repositorio con el fin de compartir los avances en el proyecto de implementación de plataforma LoRaWAN para el monitoreo/suspensión/reconexión remota de SSPP de agua y energía, usando dispositivos LoRaWAN.
