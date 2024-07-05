/*
H4ck3r Sp34k
Create a function that takes a string as an argument and returns a coded (h4ck3r 5p34k) version of the string.

Examples
hackerSpeak("javascript is cool") ➞ "j4v45cr1pt 15 c00l"

hackerSpeak("programming is fun") ➞ "pr0gr4mm1ng 15 fun"

hackerSpeak("become a coder") ➞ "b3c0m3 4 c0d3r"
Notes
In order to work properly, the function should replace all "a"s with 4, "e"s with 3, "i"s with 1, "o"s with 0, and "s"s with 5.

 */

function hackerSpeak(str) {
    let newStr = str.replace(/a/g, "4").replace(/e/g, "3").replace(/i/g, "1").replace(/o/g, "0").replace(/s/g, "5");
    return newStr;
}


function hackerSpeak2(str) {
    const change = [
        {'sustituir': 'a', 'nuevo': '4'},
        {'sustituir': 'e', 'nuevo': '3'},
        {'sustituir': 'i', 'nuevo': '1'},
        {'sustituir': 'o', 'nuevo': '0'},
        {'sustituir': 's', 'nuevo': '5'},
    ];

    // Para cada objeto, creamos una expresión regular (regex) que busca todas las ocurrencias del carácter a sustituir (par.sustituir) usando el modificador g.
    change.forEach(par => {
        const regex = new RegExp(par.sustituir, 'g');
        str = str.replace(regex, par.nuevo);
    });

    return str;
}


console.log(hackerSpeak("javascript is cool")); // "j4v45cr1pt 15 c00l"
console.log(hackerSpeak("programming is fun")); // "pr0gr4mm1ng 15 fun"
console.log(hackerSpeak("become a coder")); // "b3c0m3 4 c0d3r"


console.log(hackerSpeak2("javascript is cool")); // "j4v45cr1pt 15 c00l"
console.log(hackerSpeak2("programming is fun")); // "pr0gr4mm1ng 15 fun"
console.log(hackerSpeak2("become a coder")); // "b3c0m3 4 c0d3r"


















