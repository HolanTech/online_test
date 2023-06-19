<?php
function divide($dividend, $divisor)
{
    // Inisialisasi hasil pembagian
    $quotient = 0;

    // Selama pembagi lebih kecil atau sama dengan pembagian, lakukan pengurangan
    while ($dividend >= $divisor) {
        $dividend -= $divisor;
        $quotient++;
    }

    // Mengembalikan hasil pembagian
    return $quotient;
}

// Contoh penggunaan
echo divide(7, 2); // Output: 3
echo divide(8, 4); // Output: 2