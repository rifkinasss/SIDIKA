function formatRupiah(input) {
    let value = input.value.replace(/[^,\d]/g, "");
    if (!value) {
        input.value = "";
        return;
    }

    let parts = value.split(",");
    let remaining = parts[0].length % 3;
    let rupiah = parts[0].substr(0, remaining);
    let thousands = parts[0].substr(remaining).match(/\d{3}/g);

    if (thousands) {
        let separator = remaining ? "." : "";
        rupiah += separator + thousands.join(".");
    }

    rupiah = parts[1] !== undefined ? rupiah + "," + parts[1] : rupiah;
    input.value = "Rp. " + rupiah;
}

function hitungSelisihTanggal(tanggalBerangkat, tanggalKembali) {
    var satuHari = 24 * 60 * 60 * 1000;
    var tanggalBerangkatObj = new Date(tanggalBerangkat);
    var tanggalKembaliObj = new Date(tanggalKembali);
    var selisihHari = Math.round(
        Math.abs((tanggalBerangkatObj - tanggalKembaliObj) / satuHari)
    );
    return selisihHari;
}

$(document).ready(function () {
    $("#tanggal-berangkat, #tanggal-kembali").on("change", function () {
        var tanggalBerangkat = $("#tanggal-berangkat").val();
        var tanggalKembali = $("#tanggal-kembali").val();

        if (tanggalBerangkat && tanggalKembali) {
            var selisihHari = hitungSelisihTanggal(
                tanggalBerangkat,
                tanggalKembali
            );
            $("#jumlah-hari").val(selisihHari);
        } else {
            $("#jumlah-hari").val("");
        }
    });
});

function totaluang(jumlahHari, uangHarian) {
    var total = 0;
    if (jumlahHari && uangHarian) {
        uangHarian = uangHarian.replace(/\D/g, ""); // Menghapus semua karakter non-digit
        total = jumlahHari * parseFloat(uangHarian);
        total = Math.floor(total); // Menghilangkan desimal
    }
    return total;
}

$(document).ready(function () {
    $("#jumlah-hari, #uang-harian").on("change", function () {
        var jumlahHari = $("#jumlah-hari").val();
        var uangHarian = $("#uang-harian").val();

        if (uangHarian) {
            uangHarian = uangHarian.replace(/\D/g, "");

            var totalUang = totaluang(jumlahHari, uangHarian);
            if (!isNaN(totalUang)) {
                var totalUangharian = totalUang.toLocaleString("id-ID", {
                    style: "currency",
                    currency: "IDR",
                    maximumFractionDigits: 0,
                });
                $("#jumlah-uang-harian").val(totalUangharian);
            } else {
                $("#jumlah-uang-harian").val("");
            }
        } else {
            $("#jumlah-uang-harian").val("");
        }
    });
});

function jumlahbiaya(
    JumlahUangHarian,
    biayaAkomodasi,
    biayaLain,
    biayaTiket,
    UangReseprentasi
) {
    var jumlahBiaya = 0;
    JumlahUangHarian = parseFloat(JumlahUangHarian);
    biayaAkomodasi = parseFloat(biayaAkomodasi);
    biayaLain = parseFloat(biayaLain);
    biayaTiket = parseFloat(biayaTiket);
    UangReseprentasi = parseFloat(UangReseprentasi);

    var jumlahBiaya = Math.round(
        Math.abs(
            JumlahUangHarian +
                biayaAkomodasi +
                biayaLain +
                biayaTiket +
                UangReseprentasi
        )
    );
    return jumlahBiaya;
}

$(document).ready(function () {
    $(
        "#jumlah-uang-harian, #biaya-akomodasi, #biaya-lain, #biaya-tiket-pp, #uang-representasi"
    ).on("change", function () {
        var JumlahUangHarian = $("#jumlah-uang-harian").val();
        var biayaAkomodasi = $("#biaya-akomodasi").val();
        var biayaLain = $("#biaya-lain").val();
        var biayaTiket = $("#biaya-tiket-pp").val();
        var UangReseprentasi = $("#uang-representasi").val();

        if (
            (JumlahUangHarian,
            biayaAkomodasi,
            biayaLain,
            biayaTiket,
            UangReseprentasi)
        ) {
            JumlahUangHarian = JumlahUangHarian.replace(/\D/g, "");
            biayaAkomodasi = biayaAkomodasi.replace(/\D/g, "");
            biayaLain = biayaLain.replace(/\D/g, "");
            biayaTiket = biayaTiket.replace(/\D/g, "");
            UangReseprentasi = UangReseprentasi.replace(/\D/g, "");

            var JumlahUang = jumlahbiaya(
                JumlahUangHarian,
                biayaAkomodasi,
                biayaLain,
                biayaTiket,
                UangReseprentasi
            );
            if (!isNaN(JumlahUang)) {
                var formattedTotal = JumlahUang.toLocaleString("id-ID", {
                    style: "currency",
                    currency: "IDR",
                    maximumFractionDigits: 0,
                });
                $("#jumlah-biaya").val(formattedTotal);
            } else {
                $("#jumlah-biaya").val("");
            }
        } else {
            $("#jumlah-biaya").val("");
        }
    });
});
$(function () {
    var dtToday = new Date();
    var month = dtToday.getMonth() + 1;
    var day = dtToday.getDate();
    var year = dtToday.getFullYear();

    if (month < 10) month = "0" + month.toString();

    if (day < 10) day = "0" + day.toString();

    var minDate = year + "-" + month + "-" + day;
    $("#tanggal-berangkat").attr("min", minDate);
    $("#tanggal-kembali").attr("min", minDate);
});
