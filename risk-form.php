<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/static/css/output.css" rel="stylesheet">
    <link href="/static/css/tailwind.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography"></script>
    <script src="https://unpkg.com/unlazy@0.11.3/dist/unlazy.with-hashing.iife.js" defer init></script>
    <script src="https://kit.fontawesome.com/385cd213ed.js" crossorigin="anonymous"></script>
    
<title>Risk</title>

    <script src="/static/js/custom.js" defer></script>
</head>
<body>
    
<script src="https://kit.fontawesome.com/385cd213ed.js" crossorigin="anonymous"></script>
<header class="border-b-4 border-black h-16 flex flex-shrink-0 z-50">
    <div class="flex justify-between w-full flex-row">
        <div class="logo flex flex-row justify-items-center content-center gap-3">
            <a href="/"><img src="/static/img/RizzMan.png" alt="logo" class="h-[54px]"></a>
        </div>
        <div class="navBar flex items-center">
            <ul class="flex flex-row gap-[10px] h-auto">
                
                <li><a class="buttonRec hidden lg:block" href="/profile/">Profil</a></li>
                <li><a class="buttonRec hidden lg:block" href="/view/">Forms</a></li>
                
                <li><a class="buttonRec hidden lg:block" id="logout" href="/logout/">Logout</a></li>
                
                
                <li><button class="text-[25px] px-2 rounded-md transition-all duration-200 ease-in-out" id="burger" onclick="burgerPop()"><i class="fa-solid fa-bars"></i></button></li>

            </ul>
        </div>
    </div>
</header>
<!-- Overlay -->
<div id="overlay" class="hidden fixed inset-0 z-40" onclick="loginPopup()"></div>
<div class="container hidden fixed inset-0 justify-center items-center z-50 transition-all duration-200" id="loginPop">
    <div class="loginBox">
        <button class="absolute top-4 right-4" onclick="loginPopup()">
            <i class="fa-solid fa-square-xmark text-[25px]"></i>
        </button>
        <div class="wlcm">
            <h2 class="textCenter">Log In</h2>
            <div class="login">
                <form action="" method="post" class="formlgnn">
                    <input type="hidden" name="csrfmiddlewaretoken" value="WSerH5yckAjxABEoVToH7v8b0AEnMWp75h7x6sifQQBvPO5xB2rASPzhvm9HPxTg">
                    <span class="text text-red-500">
                        
                    </span>
                    <div class="ket">
                        <h4 class="header4">Username</h4>
                        
                    </div>
                    <div class="ket">
                        <h4 class="header4">Password</h4>
                        
                    </div>
                    <button type="submit" class="w-full h-[39px] bg-[#e5f3f1] hover:bg-[#d7f2ed] p-0 buttonRec text-center text-black text-lg font-normal">
                        Login
                    </button> 
                </form>
            </div>
        </div>
    </div>
</div>

<div id="burgerNav" class="z-10">
    <ul class="flex flex-col">
        <li><div class="font-bold font-['Raleway'] hover:shadow-none border-0 rounded-none shadow-none flex justify-center align-middle h-auto bg-[#e2feff] hover:bg-[#cdf7fb] p-0"><a class="text-center text-[20px] hover:text-[25px] transition-all duration-200 w-full h-auto p-3" href='/profile/'>Profil</a></div></li>
        <li><div class="font-bold font-['Raleway'] hover:shadow-none border-0 rounded-none shadow-none flex justify-center align-middle h-auto bg-[#e2feff] hover:bg-[#cdf7fb] p-0"><a class="text-center text-[20px] hover:text-[25px] transition-all duration-200 w-full h-auto p-3" href='/forms/'>Isi Formulir</a></div></li>
        <li><div class="font-bold font-['Raleway'] hover:shadow-none border-0 rounded-none shadow-none flex justify-center align-middle bg-[#e2feff] hover:bg-[#cdf7fb] h-auto p-0"><a class="text-center text-[20px] hover:text-[25px] transition-all duration-200 w-full h-auto p-3" href="/view/">Lihat Tabel</a></div></li>
        
        <li><div class="font-bold font-['Raleway'] border-black hover:shadow-none border-0 border-b-[3px] rounded-none shadow-none flex justify-center align-middle bg-[#f9ced0] hover:bg-[#ffc1c5] h-auto p-0"><a class="text-center text-[20px] hover:text-[25px] transition-all duration-200 w-full h-auto p-3" href="/logout/">Logout</a></div></li>
        
    </ul>
</div>

<script>
    
    function burgerPop() {
        var x = document.getElementById("burgerNav");
        if (x.style.display === "block") {
            x.style.top = "-150px";
            setTimeout(function() {
                x.style.display = "none";
            }, 400);
        } else {
            x.style.display = "block";
            setTimeout(function() {
                x.style.top = "65px";
            }, 400);
        }
    }
    let isToggled = false;
    const x = document.getElementById("burger");
    x.addEventListener("click", function() {
        x.style.backgroundColor = isToggled ? "white" : "rgb(31 41 55)";
        x.style.color = isToggled ? "black" : "white";
        isToggled = !isToggled;
    });

    function loginPopup() {
    const popup = document.getElementById('loginPop');
    const overlay = document.getElementById('overlay');
    const pageWrapper = document.getElementById('pageWrapper');

    if (popup.classList.contains('hidden')) {
        // Saat popup dibuka
        popup.classList.remove('hidden');
        popup.classList.add('popup-enter'); // Tambahkan animasi masuk
        overlay.classList.remove('hidden');
        pageWrapper.classList.add('blur-bg');

        // Hapus kelas animasi setelah animasi selesai
        setTimeout(() => {
            popup.classList.remove('popup-enter');
            popup.classList.add('flex'); // Tetapkan gaya flex setelah masuk
        }, 100); // Durasi animasi sesuai dengan CSS (0.3s)
    } else {
        // Saat popup ditutup
        popup.classList.add('popup-exit-active'); // Tambahkan animasi keluar
        pageWrapper.classList.remove('blur-bg');
        popup.classList.add('hidden');
        popup.classList.remove('popup-exit-active');
        
        // Sembunyikan popup setelah animasi selesai
        setTimeout(() => {
            overlay.classList.add('hidden');
            popup.classList.remove('flex');
        }, 300); // Durasi animasi sesuai dengan CSS (0.3s)
    }
}
</script>
    
<div id="pageWrapper" class="w-full mx-auto p-4 bg-white shadow rounded-lg gap-6">
    <h2 class="header1 p-2">Form Risiko</h2>
    <div class="mb-4">
        
    </div>
    
    
    <form method="post" class="formRisk">
        <div class="infSpan mt-4">
            <h1 class="infSpan header3 font-bold">Informasi Resiko :</h1>
        </div>
        <input type="hidden" name="csrfmiddlewaretoken" value="WSerH5yckAjxABEoVToH7v8b0AEnMWp75h7x6sifQQBvPO5xB2rASPzhvm9HPxTg">
        <!-- Tujuan -->
        <div class="">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="id_tujuan">Tujuan</label>
            <input type="text" name="tujuan" class="bg-slate-100 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required id="id_tujuan">
            
        </div>
        
        <!-- Kode resiko  -->
        <div class="">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="id_kode_resiko">Kode Resiko</label>
            <input type="text" name="kode_resiko" class="bg-slate-100 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" maxlength="255" required id="id_kode_resiko">
            
        </div>
        <div class="md:col-span-2">
            <div class="grid grid-cols-3 gap-3">
                <!-- Proses bisnis  -->
                <div class="">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="id_proses_bisnis">Proses Bisnis</label>
                    <select name="proses_bisnis" class="bg-slate-100 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required id="id_proses_bisnis">
  <option value="" selected>---------</option>

  <option value="1">Testing</option>

</select>
                    
                </div>
        
                <!-- Kelompok resiko  -->
                <div class="">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="id_kelompok_resiko">Kelompok</label>
                    <select name="kelompok_resiko" class="bg-slate-100 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required id="id_kelompok_resiko">
  <option value="" selected>---------</option>

  <option value="1">Testing</option>

</select>
                    
                </div>
                
                <!-- Sumber resiko -->
                <div class="">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="id_sumber_resiko">Sumber</label>
                    <select name="sumber_resiko" class="bg-slate-100 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required id="id_sumber_resiko">
  <option value="" selected>---------</option>

  <option value="internal">Internal</option>

  <option value="external">External</option>

  <option value="both">Internal dan External</option>

</select>
                    
                </div>
            </div>
        </div>
        <!-- Uraian Peristiwa -->
        <div class="">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="id_uraian_peristiwa">Uraian Peristiwa</label>
            <textarea name="uraian_peristiwa" cols="40" rows="3" class="bg-slate-100 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required id="id_uraian_peristiwa">
</textarea>
            
        </div>
        
        <!-- Penyebab resiko -->
        <div class="">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="id_penyebab_resiko">Penyebab Resiko</label>
            <textarea name="penyebab_resiko" cols="40" rows="3" class="bg-slate-100 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required id="id_penyebab_resiko">
</textarea>
            
        </div>

        <div class="infSpan mt-4">
            <h1 class="infSpan header3 font-bold">Potensi Kerugian :</h1>
        </div>
        
        <!-- Akibat  -->
        <div class="">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="id_akibat">Akibat</label>
            <textarea name="akibat" cols="40" rows="3" class="bg-slate-100 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required id="id_akibat">
</textarea>
            
        </div>
        
        <!-- Finansial  -->
        <div class="">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="id_akibat_finansial">Akibat Finansial</label>
            <input type="number" name="akibat_finansial" class="block bg-slate-100 w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" min="0" required id="id_akibat_finansial">
            
        </div>

        <div class="infSpan mt-4">
            <h1 class="infSpan header3 font-bold">Informasi Terkait :</h1>
        </div>
        <!-- Pemilik -->
        <div class="">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="id_pemilik_resiko">Pemilik Resiko</label>
            <input type="text" name="pemilik_resiko" class="block bg-slate-100 w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" maxlength="255" required id="id_pemilik_resiko">
            
        </div>

        <!-- Departemen -->
        <div class="">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="id_departemen">Departemen</label>
            <select name="departemen" class="block bg-slate-100 w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required id="id_departemen">
  <option value="" selected>---------</option>

  <option value="1">Testing</option>

</select>
            
        </div>

        <div class="infSpan mt-4">
            <h1 class="infSpan header3 font-bold">Penilaian Risiko :</h1>
        </div>
        
        <!-- Inherent -->
        <div class="">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="id_inherent_likelihood">Inherent Likelihood</label>
            <input type="number" name="inherent_likelihood" value="0" class="block bg-slate-100 w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" min="0" required id="id_inherent_likelihood">
            
        </div>
        
        <div class="">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="id_inherent_impact">Inherent Impact</label>
            <input type="number" name="inherent_impact" value="0" class="block bg-slate-100 w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" min="0" required id="id_inherent_impact">
            
        </div>
        
        <div class="infSpan mt-2">
            <h1 class="header3 font-bold">Pengendalian :</h1>
        </div>
        
        <!-- Kontrol -->
         <div class="md:col-span-2">
            <div class="grid grid-cols-3 gap-3">
                <div class="">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="id_control">Control</label>
                    <select name="control" class="block bg-slate-100 w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required id="id_control">
  <option value="" selected>---------</option>

  <option value="True">Ada</option>

  <option value="False">Tidak</option>

</select>
                    
                </div>
                    
                <!-- Memadai  -->
                <div class="">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="id_memadai">Memadai</label>
                    <select name="memadai" class="block bg-slate-100 w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required id="id_memadai">
  <option value="" selected>---------</option>

  <option value="True">Memadai</option>

  <option value="False">Tidak Memadai</option>

</select>
                    
                </div>
             
                <!-- Status  -->
                <div class="">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="id_status">Status</label>
                    <select name="status" class="block bg-slate-100 w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required id="id_status">
  <option value="" selected>---------</option>

  <option value="True">Executed</option>

  <option value="False">Ongoing</option>

</select>
                    
                </div>
                </div>
            </div>
            
        <!-- Residual -->
        <div class="">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="id_residual_likelihood">Residual Likelihood</label>
            <input type="number" name="residual_likelihood" value="0" class="block bg-slate-100 w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" min="0" required id="id_residual_likelihood">
            
        </div>
        
        <div class="">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="id_residual_impact">Residual Impact</label>
            <input type="number" name="residual_impact" value="0" class="block bg-slate-100 w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" min="0" required id="id_residual_impact">
            
        </div>
        
        <div class="infSpan mt-4">
            <h1 class="infSpan header3 font-bold">Penanganan :</h1>
        </div>
        
        <!-- Tindakan mitigasi  -->
        <div class="">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="id_tindakan_mitigasi">Tindakan Mitigasi</label>
            <textarea name="tindakan_mitigasi" cols="40" rows="3" class="block bg-slate-100 w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required id="id_tindakan_mitigasi">
</textarea>
            
        </div>
        <!-- Perlakuan -->
        <div class="">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="id_perlakuan">Perlakuan</label>
            <select name="perlakuan" class="block bg-slate-100 w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required id="id_perlakuan">
  <option value="" selected>---------</option>

  <option value="True">Accept</option>

  <option value="True">Reduce</option>

</select>
            
        </div>
        

        <!-- Mitigasi Score -->
        <div class="">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="id_mitigasi_likelihood">Mitigasi Likelihood</label>
            <input type="number" name="mitigasi_likelihood" value="0" class="block bg-slate-100 w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" min="0" required id="id_mitigasi_likelihood">
            
        </div>
        
        <div class="">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="id_mitigasi_impact">Mitigasi Impact</label>
            <input type="number" name="mitigasi_impact" value="0" class="block bg-slate-100 w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" min="0" required id="id_mitigasi_impact">
            
        </div>
        
        <div class="infSpan flex items-center justify-end my-4">
            <button type="submit" id="submitFrm" class="px-4 py-2 buttonCir header3 text-[20px]">Submit</button>
        </div>
    </form>
      
</div>   

    

<footer class="h-[50px] flex flex-grow-0 flex-shrink-0 justify-center items-center border-t-4 bg-[#f8f7ff] border-black">
      <p class="text-sm">© 2024 <a href="" class="hover:underline">RizzMan™</a>. All Rights Reserved.
      </p>
</footer>

<script defer src="https://static.cloudflareinsights.com/beacon.min.js/vcd15cbe7772f49c399c6a5babf22c1241717689176015" integrity="sha512-ZpsOmlRQV6y907TI0dKBHq9Md29nnaEIPlkf84rnaERnq6zvWvPUqr2ft8M1aS28oN72PdrCzSjY4U6VaAw1EQ==" data-cf-beacon='{"rayId":"8ef15e576c4c87c0","version":"2024.10.5","r":1,"token":"4545d82ff20b40faa38680a096719202","serverTiming":{"name":{"cfExtPri":true,"cfL4":true,"cfSpeedBrain":true,"cfCacheStatus":true}}}' crossorigin="anonymous"></script>
</body>
</html>