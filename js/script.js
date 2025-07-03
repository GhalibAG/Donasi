// Script untuk mengubah warna navbar saat scroll
window.addEventListener('scroll', function() {
  const navbar = document.querySelector('.navbar');
  
  // Jika scroll lebih dari 50px, tambahkan kelas 'scrolled'
  if (window.scrollY > 50) {
    navbar.classList.add('scrolled'); // Menambahkan kelas 'scrolled' ke navbar
  } else {
    navbar.classList.remove('scrolled'); // Menghapus kelas 'scrolled' saat scroll kembali ke atas
  }
});


// Sign Up Form Validation
document.getElementById('signupForm').addEventListener('submit', function(event) {
  event.preventDefault();
  let email = document.getElementById('signupEmail').value;
  let password = document.getElementById('signupPassword').value;
  
  // Simpan data (simulasi)
  console.log("Email:", email);
  console.log("Password:", password);
  
  // Tampilkan modal pendaftaran berhasil
  var successModal = new bootstrap.Modal(document.getElementById('successModal'));
  successModal.show();
});

// Login Form Validation
document.getElementById('loginForm').addEventListener('submit', function(event) {
  event.preventDefault();
  
  let email = document.getElementById('loginEmail').value;
  let password = document.getElementById('loginPassword').value;
  
  // Validasi email
  if (email.includes('@gmail.com')) {
    // Jika email valid, lanjut ke index.html
    window.location.href = 'index.html'; // Ganti dengan halaman tujuan setelah login
  } else {
    alert('Email harus menggunakan @gmail.com!');
  }
});
