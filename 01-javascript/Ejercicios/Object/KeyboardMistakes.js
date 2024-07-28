/*
Character recognition software often makes mistakes when documents (especially old ones written with a typewriter) are digitized.

Your task is to correct the errors in the digitized text. You only have to handle the following mistakes:

A is misinterpreted as 4
S is misinterpreted as 5
O is misinterpreted as 0
I is misinterpreted as 1
The test cases contain numbers only by mistake.

Examples
keyboardMistakes("MUB45H1R") ➞ "MUBASHIR"

keyboardMistakes("DUBL1N") ➞ "DUBLIN"

keyboardMistakes("51NG4P0RE") ➞ "SINGAPORE"
 */


function keyboardMistakes(str) {
    const chars = [
        {character : '4', misinterpreted : 'A' },
        {character : '5', misinterpreted : 'S' },
        {character : '0', misinterpreted : 'O' },
        {character : '1', misinterpreted : 'I' },
    ]

    // Función que itera el array de objetos
    const findCharacter = (char) => {
        let result = null;
        chars.forEach(obj => {
            if (obj.character === char) {
                result = obj.misinterpreted;
            }
        });
        return result;
    };

    let resultado = '';
    let correctedStr = '';

    // Iteramos la cadena de texto
    for (let char of str) {
        resultado =  findCharacter(char)
        resultado == null ? correctedStr += char : correctedStr += resultado;
    }

    return correctedStr;
}


// Test Cases
console.log(keyboardMistakes("MUB45H1R")); // ➞ "MUBASHIR"
console.log(keyboardMistakes("DUBL1N")); // ➞ "DUBLIN"
console.log(keyboardMistakes("51NG4P0RE")); // ➞ "SINGAPORE"
console.log(keyboardMistakes("1ND0NES1A")); // ➞ "INDONESIA"
