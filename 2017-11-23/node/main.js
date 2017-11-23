var fs = require('fs');

function copy(src, dst) {
    fs.writeFileSync('copy.js', fs.readFileSync('./util/counter.js'));
}

function main(argv) {
    copy(argv[0], argv[1]);
}

main(process.argv.slice(2));


//
//var fs = require('fs');
//
//function copy(src, dst) {
//    fs.createReadStream('./util/counter.js').pipe(fs.createWriteStream('copy2.js'));
//}
//
//function main(argv) {
//    copy(argv[0], argv[1]);
//}
//
//main(process.argv.slice(2));