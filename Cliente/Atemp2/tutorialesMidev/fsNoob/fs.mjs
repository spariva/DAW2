import fs from 'node:fs'

// const stats = fs.statSync('./file.txt')

// console.log(stats);
// console.log(
//     stats.isFile(),
//      stats.isDirectory(),
//       stats.isSymbolicLink()
// )

const file = './file.txt'
const content = fs.readFileSync(file, 'utf-8') //también se puede hacer Async
console.log(content);