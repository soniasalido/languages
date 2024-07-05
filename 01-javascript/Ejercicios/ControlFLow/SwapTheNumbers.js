/*
Swap the Numbers
Imagina que tienes tres números: a, b y c. c es igual a a o b, pero no sabes cuál. Su tarea es crear una función que
devuelva cualquier número que no sea c, entre a y b. Entonces, si c es igual a a, devuelve b, y si c es igual a b, devuelve a.
Esto es lo que dificulta este desafío: no puedes usar ninguna declaración if.
Examples
swap(1, 0, 0) ➞ 1
// a = 1, b = 0, c = b
// return a

swap(1, 3, 1) ➞ 3
// a = 1, b = 3, c = a
// return b

swap(27, 31, 31) ➞ 27
// a = 27, b = 31, c = b
// return a

 */


function swap(a, b, c) {
    return c === a ? b : a;
}