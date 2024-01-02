const os = require('node:os');
//import os from 'node:os'; mjs este también funcionaría
//import { cpus, platform, release, homedir, hostname, networkInterfaces, userInfo, version, type, uptime, tmpdir, totalmem, freemem } from 'node:os';
console.log('CPUS info: ', os.cpus());
console.log(os.platform());
console.log(os.release());
console.log(os.homedir());
console.log('Nombre ordenador: ', os.hostname());
console.log(os.networkInterfaces());
console.log(os.userInfo());
console.log(os.version());
console.log(os.type());
console.log('Días encendido: ', os.uptime()/60/60/24);
console.log(os.tmpdir());
console.log('Memoria total: ', os.totalmem()/1024/1024/1024);
console.log('Memoria libre: ', os.freemem()/1024/1024/1024);
