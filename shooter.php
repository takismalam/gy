<?php
date_default_timezone_set('Asia/Jakarta');
include "function.php";
echo color("purple","▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔\n");
echo color("nevy","          Claim Voucher GORIDE 8K         \n");
echo color("nevy","          Claim Voucher EATLAH 10K       \n");
echo color("nevy","          Claim Voucher FOOD 30K         \n");
echo color("purple","▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔\n");
echo color("purple","▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔\n");
echo color("nevy","    ☢️          •| FOODHUNTER |•        ☢️\n");
echo color("nevy","    ☢️       BY : ShooterMagak          ☢️\n");
echo color("nevy","    ☢️  Time  : ".date('[d-m-Y] [H:i:s]')." ☢️\n");
echo color("nevy","    ☢️ Format Penulisan Nomor 62xxxxxxx ☢️\n");
echo color("purple","▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔\n");
function change(){
        $nama = nama();
        $email = str_replace(" ", "", $nama) . mt_rand(100, 999);
        ulang:
        echo color("nevy","📲 Nomor : ");
        $no = trim(fgets(STDIN));
        $data = '{"email":"'.$email.'@gmail.com","name":"'.$nama.'","phone":"+'.$no.'","signed_up_country":"ID"}';
        $register = request("/v5/customers", null, $data);
        if(strpos($register, '"otp_token"')){
        $otptoken = getStr('"otp_token":"','"',$register);
        echo color("nevy","📶 Kode Wes Tak Kirim Cok")."\n";
        otp:
        echo color("nevy","✉️  Otp: ");
        $otp = trim(fgets(STDIN));
        $data1 = '{"client_name":"gojek:cons:android","data":{"otp":"' . $otp . '","otp_token":"' . $otptoken . '"},"client_secret":"83415d06-ec4e-11e6-a41b-6c40088ab51e"}';
        $verif = request("/v5/customers/phone/verify", null, $data1);
        if(strpos($verif, '"access_token"')){
        echo color("nevy","✔️ Berhasil mendaftar");
        $token = getStr('"access_token":"','"',$verif);
        $uuid = getStr('"resource_owner_id":',',',$verif);
        echo "\n".color("nevy","🎫 Jepuk'en Voucher'e?: y/n ");
        $pilihan = trim(fgets(STDIN));
        if($pilihan == "y" || $pilihan == "Y"){
        echo color("purple","===========(THANKS NADIEM)===========");
        echo "\n".color("nevy","🔒 Claim 🎫 Kevin A");
        echo "\n".color("nevy","⏳ Please wait");
        for($a=1;$a<=3;$a++){
        echo color("nevy",".");
        sleep(1);
        }
        $code1 = request('/go-promotions/v1/promotions/enrollments', $token, '{"promo_code":"COBAGOFOOD010420A"}');
        $message = fetch_value($code1,'"message":"','"');
        if(strpos($code1, 'Promo kamu sudah bisa dipakai')){
        echo "\n".color("purple","🔒 Message: ".$message);
        goto goride;
        }else{
        echo "\n".color("purple","🔒 Message: ".$message);
        echo "\n".color("nevy","🔒 Claim 🎫 Kevin B");
        echo "\n".color("nevy","⏳ Please wait");
        for($a=1;$a<=3;$a++){
        echo color("nevy",".");
        sleep(1);
        }
        sleep(3);
        $boba19 = request('/go-promotions/v1/promotions/enrollments', $token, '{"promo_code":"COBAGOFOOD010420B"}');
        $messageboba19 = fetch_value($boba19,'"message":"','"');
        if(strpos($boba19, 'Promo kamu sudah bisa dipakai.')){
        echo "\n".color("purple","🔒 Message: ".$messageboba19);
        goto goride;
        }else{
        echo "\n".color("purple","🔒 Message: ".$messageboba19);
        echo "\n".color("nevy","🔒 Claim 🎫 EATLAH ");
        echo "\n".color("nevy","⏳ Please wait");
        for($a=1;$a<=3;$a++){
        echo color("nevy",".");
        sleep(1);
        }
        sleep(3);
        $boba11 = request('/go-promotions/v1/promotions/enrollments', $token, '{"promo_code":"EATLAH"}');
        $messageboba11 = fetch_value($boba11,'"message":"','"');
        if(strpos($boba11, 'Promo kamu sudah bisa dipakai.')){
        echo "\n".color("purple","🔒 Message: ".$messageboba11);
        goto goride;
        }else{
        echo "\n".color("purple","🔒 Message: ".$messageboba11);
        goride:
        echo "\n".color("nevy","🔒 Caim 🎫 GORIDE");
        echo "\n".color("nevy","⏳ Please wait");
        for($a=1;$a<=3;$a++){
        echo color("nevy",".");
        sleep(1);
        }
        sleep(3);
        $goride = request('/go-promotions/v1/promotions/enrollments', $token, '{"promo_code":"BREADLIFE"}');
        $message1 = fetch_value($goride,'"message":"','"');
        echo "\n".color("purple","🔒 Message: ".$message1);
        sleep(3);
        $cekvoucher = request('/gopoints/v3/wallet/vouchers?limit=10&page=1', $token);
        $total = fetch_value($cekvoucher,'"total_vouchers":',',');
        $voucher3 = getStr1('"title":"','",',$cekvoucher,"3");
        $voucher1 = getStr1('"title":"','",',$cekvoucher,"1");
        $voucher2 = getStr1('"title":"','",',$cekvoucher,"2");
        $voucher4 = getStr1('"title":"','",',$cekvoucher,"4");
        echo "\n".color("purple","🎫 Total voucher ".$total." : ");
        echo color("purple","1. ".$voucher1);
        echo "\n".color("purple","                      2. ".$voucher2);
        echo "\n".color("purple","                      3. ".$voucher3);
        echo "\n".color("purple","                      4. ".$voucher4);
        $expired1 = getStr1('"expiry_date":"','"',$cekvoucher,'1');
        $expired2 = getStr1('"expiry_date":"','"',$cekvoucher,'2');
        $expired3 = getStr1('"expiry_date":"','"',$cekvoucher,'3');
        $expired4 = getStr1('"expiry_date":"','"',$cekvoucher,'4');
         setpin:
         echo "\n".color("nevy","🔧🔒 Mau set pin?: y/n ");
         $pilih1 = trim(fgets(STDIN));
         if($pilih1 == "y" || $pilih1 == "Y"){
         //if($pilih1 == "y" && strpos($no, "628")){
         echo color("purple","========( PIN ANDA = Hanya Kevin Yang Tau )========")."\n";
         $data2 = '{"pin":"121212"}';
         $getotpsetpin = request("/wallet/pin", $token, $data2, null, null, $uuid);
         echo color("nevy","✉️  Otp Cok: ");
         $otpsetpin = trim(fgets(STDIN));
         $verifotpsetpin = request("/wallet/pin", $token, $data2, null, $otpsetpin, $uuid);
         echo $verifotpsetpin;
         }else if($pilih1 == "n" || $pilih1 == "N"){
         die();
         }else{
         echo color("red","❌ GAGAL!!!\n");
         }
         }
         }
         }
         }else{
         goto setpin;
         }
         }else{
         echo color("red","❌ MASUKNO KODE OTP AE SALAH");
         echo"\n==================================\n\n";
         echo color("green","🔁 LEBOKNO MANEH OTP E\n");
         goto otp;
         }
         }else{
         echo color("red","📵 NOMOR WES KEDAFTAR BLOK !!!");
         echo color("nevy","BALEN ONO? (y/n): ");
         $pilih = trim(fgets(STDIN));
         if($pilih == "y" || $pilih == "Y"){
         echo "\n==============Register==============\n";
         goto ulang;
         }else{
         echo "\n==============Register==============\n";
         goto ulang;
  }
 }
}
echo change()."\n"; ?>
