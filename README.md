# FactoriaF5-Kata-DNI

# Requirement
- composer
- PHPUnit 9

# Install
- composer install
- composer require --dev phpunit/phpunit ^9

# Objectif
Nuestro ejercicio consistirá en crear una classe que nos sirva para representar un DNI o NIF. Por tanto, queremos que se pueda instanciar un objeto sólo si tenemos un DNI válido.

¿Qué vamos a testear?
Esencialmente, un DNI no es más que una cadena de caracteres con un formato específico. De todas las cadenas de caracteres que se podrían generar sólo un subconjunto de ellas cumplen todas las condiciones exigidas para ser un DNI. Estas condiciones se pueden resumir en:

- Son cadenas de 9 caracteres.
- Los primeros 8 caracteres son números, y el último es una letra.
- La letra puede ser cualquiera, excepto U, I, O y Ñ.
- La última letra se obtiene a partir de un algoritmo que la consulta de una tabla a partir de obtener el resto de dividir la suma de los dígitos numéricos entre 23. Si la letra suministrada no se corresponde con la calculada, el DNI no es válido.
- El primer carácter puede ser X, Y o Z, lo que indica un NIE (Número de identificación para personas extranjeras).
- Para la validación, las letras XYZ se reemplazan por 0, 1 ó 2, respectivamente.
- En caso de que alguna de las condiciones no se cumple, el DNI no es válido.

Si nos fijamos en las condiciones recogidas en la lista anterior, vemos que cada una de ellas reduce el número de cadenas de caracteres candidatas a ser un DNI.

# Information
- El algoritmo para validar un DNI es muy sencillo: se toma la parte del numero del documento y se divide entre 23 y se obtiene el resto. Ese resto es un índice que se consulta en una tabla de letras. La letra correspondiente al índice es la que debería tener un DNI válido. Por tanto, si la letra del DNI concuerda con la que hemos obtenido, es que es válido.

TABLE:
0	T
1	R
2	W
3	A
4	G
5	M
6	Y
7	F
8	P
9	D
10	X
11	B
12	N
13	J
14	Z
15	S
16	Q
17	V
18	H
19	L
20	C
21	K
22	E