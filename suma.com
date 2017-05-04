name 'suma'
include 'emu8086.inc'
org 100h           

.data
suma db 2 dup (?)   ;arreglo suma de 2 espacios de tipo byte

.code
Sumas proc
    printn " "
    print "primer numero: "
    call scan_num
    mov suma[0],cl
    printn " "
    print "segundo numero: "
    call scan_num
    mov suma[1],cl
    printn " "
    xor ax,ax;limpio la direccion de memoria de ax
    sub al,suma[0]
    sub al.suma[1]
    print " "
    print "la suma es : "
    call print_num   
Sumas endp

