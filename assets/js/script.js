// console.log("Bismillah bisa ini mh");

// ambnil elemen-elemen yang dibutuhkan
// var id_hsl = document.getElementById('id_hsl');

var konten2 = document.getElementById('konten2');
var id_kom = document.getElementById('id_kom');
var komoditi = document.getElementById('komoditi');
var elements = document.getElementsByClassName('id_hsl');
var id_hsl = document.getElementsByClassName('id_hasil');
var satuan = document.getElementsByClassName('satuan');
for (var i = 0; i < elements.length; i++) {
    elements[i].addEventListener('click', (function(index) {
        return function() {
            // Membuat objek ajax
            var xhr = new XMLHttpRequest();

            // Mengecek kesiapan ajax
            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    konten2.innerHTML = xhr.responseText;
                }
            }

            // Eksekusi Ajax
            xhr.open('GET', 'assets/ajax/deskripsi_hasil.php?id_hsl=' + id_hsl[index].value + "&satuan=" + satuan[index].value + "&komoditi=" + komoditi.value + "&id_kom=" + id_kom.value, true);
            xhr.send();
        }
    })(i));
}
