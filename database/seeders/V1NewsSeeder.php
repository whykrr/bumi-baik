<?php

namespace Database\Seeders;

use App\Models\NewsArticle;
use Cocur\Slugify\Slugify;
use Illuminate\Database\Seeder;

class V1NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $slugify = new Slugify();
        $title1 = "Dampak Buruk Sampah Plastik Pada Biota Laut";
        $title2 = "Kebakaran Hutan Sering Terjadi, Ketahui Dampak yang Dihasilkan Setelahnya";
        $title3 = "6 Aksi Perubahan untuk Dunia Berkelanjutan";

        $news = [
            'title' => $title1,
            'slug' => $slugify->slugify($title1),
            'image' => asset('asset/news/' . $slugify->slugify($title1) . '.jpg'),
            'author' => 'Admin',
            'content' => '<p><span style="font-size:11pt"><span style="font-family:Arial"><span style="color:#000000">&nbsp; &nbsp;Akhir-akhir ini, ketergantungan manusia pada plastik sangatlah tinggi hal ini dapat dibuktikan dari produksi plastik yang dihasilkan oleh manusia itu sendiri. Sekitar 400 juta ton plastik diproduksi oleh manusia untuk memenuhi berbagai keperluan. Indonesia sendiri menyumbang setidaknya 187 ton sampah plastik. Sebagian besar plastik tersebut berakhir menjadi limbah dan mencemari&nbsp; lautan. Sekitar 60-80% sampah di laut merupakan sampah plastik.</span></span></span></p>

            <p><span style="font-size:11pt"><span style="font-family:Arial"><span style="color:#000000">&nbsp; &nbsp;Namun, dampak dari ketergantungan manusia terhadap plastik menciptakan limbah plastik yang masif dan sangat mengancam biota laut dan ekosistemnya.&nbsp;</span></span></span><span style="font-size:11pt"><span style="font-family:Arial"><span style="color:#000000">dengan banyaknya sampah plastik di laut, menyebabkan hewan laut terkontaminasi plastik dimana biota laut mengkonsumsi plastik karena mengira plastik tersebut adalah mangsa mereka. Jika mereka terus memakan plastik, maka akan berdampak buruk bagi kesehatan biota laut tersebut karena plastik yang tertelan akan mengakibatkan &ldquo;kenyang palsu&rdquo; dan&nbsp; penyumbatan pada biota laut yang tidak sengaja mengkonsumsi plastik, seperti, bangkai Penyu dan Paus Sperma.&nbsp;&nbsp;&nbsp;&nbsp;</span></span></span></p>
            
            <p><span style="font-size:11pt"><span style="font-family:Arial"><span style="color:#000000">&nbsp; &nbsp;Bahkan, lebih dari 800 spesies di laut terancam akibat pencemaran plastik. Dari 800 spesies tersebut sekitar 40% adalah mamalia, sementara 44% lainnya adalah spesies burung laut. Tidak hanya itu, tiap tahunnya sampah plastik telah membunuh 1 juta burung laut, 100 ribu mamalia laut, kura kura laut, dan ikan-ikan dalam jumlah besar. Secara tidak langsung sampah plastik juga mengancam populasi terumbu karang karena menghalangi proses fotosintesis, membuat 60% terumbu karang telah rusak sampai sekarang.&nbsp;</span></span></span></p>
            
            <p><span style="font-size:11pt"><span style="font-family:Arial"><span style="color:#000000"><span style="font-size:11pt"><span style="font-family:Arial"><span style="color:#000000">&nbsp; &nbsp;Dampak sampah plastik memang sangat berbahaya bagi kelangsungan hidup hewan laut. Maka dari itu, keikutsertaan kita dalam menjaga ekosistem laut sangat penting. Kita bisa mengurangi ketergantungan terhadap penggunaan plastik, mengurangi penggunaan tas plastik, menggunakan botol berjenis </span></span></span><span style="font-size:11pt"><span style="font-family:Arial"><span style="color:#000000"><em>tumblr</em></span></span></span><span style="font-size:11pt"><span style="font-family:Arial"><span style="color:#000000"> dalam jangka panjang, dan mengganti sedotan plastik dengan sedotan </span></span></span><span style="font-size:11pt"><span style="font-family:Arial"><span style="color:#000000"><em>stainless.</em></span></span></span></span></span></span></p>
            
            <p>&nbsp;</p>',
        ];

        NewsArticle::create($news);

        $news2 = [
            'title' => $title2,
            'slug' => $slugify->slugify($title2),
            'image' => asset('asset/news/' . $slugify->slugify($title2) . '.jpg'),
            'author' => 'Admin',
            'content' => '<p><span style="font-size:11pt"><span style="font-family:Arial"><span style="color:#000000">Kebakaran hutan marak terjadi di Indonesia akhir-akhir ini. Tercatat sebanyak 358.867 hektar hangus terbakar pada 2021. Hutan Indonesia yang secara hukum (de jure) memiliki luas 120,5 juta hektar pada Desember 2020 tiap tahunnya semakin berkurang karena kebakaran hutan yang disebabkan baik oleh alam maupun ulah manusia. Banyaknya hutan yang dibakar hanya untuk membuka lahan juga menjadi masalah yang patut kita perhatikan lebih jauh.</span></span></span></p>

            <p><span style="font-size:11pt"><span style="font-family:Arial"><span style="color:#000000">Selain kebakaran hutan yang merugikan pada saat terjadinya, terdapat dampak-dampak lain yang muncul setelah kebakaran hutan sudah ditangani. Dampak itu dibagi menjadi 4 kategori, yaitu dampak biologi, dampak sosial ekonomi, dampak fisik dan kimia, serta dampak sosial.&nbsp;</span></span></span></p>
            
            <p><span style="font-size:11pt"><span style="font-family:Arial"><span style="color:#000000">Dampak biologi meliputi habitat makhluk hidup yang menghilang, vegetasi tanah akan berkurang dan kehilangan unsur hara, matinya hewan pengurai unsur hara organik, cadangan air tanah (artesis) berkurang karena tidak ada pohon yang menampung tanah, dan penyakit pernapasan yang muncul akibat sisa asap kebakaran hutan.&nbsp;</span></span></span></p>
            
            <p><span style="font-size:11pt"><span style="font-family:Arial"><span style="color:#000000">Dari sosial ekonomi, dampak yang ditimbulkan, yaitu keterlambatan dalam bekerja, kemacetan panjang karena sisa asap tebal, tanaman padi layu karena tidak mendapat cukup sinar matahari sehingga petani tidak mendapat hasil panen yang optimal, dan produktivitas masyarakat untuk berkegiatan menurun.</span></span></span></p>
            
            <p><span style="font-size:11pt"><span style="font-family:Arial"><span style="color:#000000">Sedangkan, dampak fisik dan kimianya antara lain, kualitas udara yang buruk karena asap serta peningkatan suhu bumi dan pemanasan global. Dampak kebakaran hutan yang terakhir atau dampak sosial, yaitu mengganggu hubungan kerjasama antar negara dan daerah.</span></span></span></p>
            
            <p><span style="font-size:11pt"><span style="font-family:Arial"><span style="color:#000000">Semua dampak di atas saling berhubungan dan mempengaruhi satu sama lain. Oleh karena itu, sebisa mungkin kita kurangi penggundulan dan pembakaran hutan untuk membuka lahan secara sengaja. Alangkah baiknya jika kita memberikan solusi dan penanganan terhadap alam yang makin rusak dan tidak mementingkan keinginan manusia sendiri.</span></span></span></p>',
        ];

        NewsArticle::create($news2);

        $news3 = [
            'title' => $title3,
            'slug' => $slugify->slugify($title3),
            'image' => asset('asset/news/' . $slugify->slugify($title3) . '.jpg'),
            'author' => 'Admin',
            'content' => '<p><span style="font-size:11pt"><span style="font-family:Arial"><span style="color:#000000">Untuk pertama kalinya, ekonomi global mengonsumsi lebih dari 100 miliar ton bahan di 2019, sebuah angka konsumsi yang besar di tengah perubahan iklim. Circularity Gap Reports mengusulkan solusi berupa ekonomi sirkular untuk mengurangi tingkat konsumsi bahan dan membantu kita untuk memitigasi perubahan iklim. Berikut adalah 6 gerakan ekonomi sirkular untuk dunia yang berkelanjutan. </span></span></span></p>

            <ol>
                <li><span style="font-size:11pt"><span style="font-family:Arial"><span style="color:#000000">Menerapkan pola makan nabati</span></span></span><br />
                <span style="font-size:11pt"><span style="font-family:Arial"><span style="color:#000000">Kita membutuhkan 25 kg biji-bijian dan 15.000 liter air sebagai bahan baku untuk membuat 1kg daging. Maka dari itu, protein dengan bahan dasar tumbuhan bisa menjadi solusi permintaan protein hewani. Dengan memilih protein nabati, kita bisa mengurangi emisi karbon sebanyak 1.32 miliar emisi.&nbsp;</span></span></span><br />
                &nbsp;</li>
                <li style="list-style-type:decimal"><span style="font-size:11pt"><span style="font-family:Arial"><span style="color:#000000">Memasak tanpa polusi</span></span></span><br />
                <span style="font-size:11pt"><span style="font-family:Arial"><span style="color:#000000">Sekitar 4 juta orang meninggal karena polusi yang dikeluarkan dari proses memasak. Kompor yang menghasilkan karbon ternyata berkontribusi dalam penumpukan emisi karbon. Untuk menangani hal tersebut, memasak dengan kompor listrik tenaga surya canggih bisa menjadi salah satu solusi untuk mengurangi emisi karbon akibat kompor yang menghasilkan karbon.</span></span></span><br />
                &nbsp;</li>
                <li style="list-style-type:decimal"><span style="font-size:11pt"><span style="font-family:Arial"><span style="color:#000000">Membangun bangunan yang awet</span></span></span><br />
                <span style="font-size:11pt"><span style="font-family:Arial"><span style="color:#000000">Bangunan yang terbengkalai dan runtuh ternyata bisa mengganggu keberlanjutan bumi kita. Bangunan-bangunan kosong dan rusak itu akan memakan tempat, sedangkan dengan tumbuhnya populasi yang semakin masif, permintaan tempat tinggal akan sangat tinggi. Oleh karena itu, pembangunan dengan desain modular bisa menjadi salah satu solusi. Kita bisa menyesuaikan, menggunakan kembali, atau relokasi bangunan tersebut saat dibutuhkan dari waktu ke waktu.</span></span></span><br />
                &nbsp;</li>
                <li style="list-style-type:decimal"><span style="font-size:11pt"><span style="font-family:Arial"><span style="color:#000000">Menggunakan rumah yang ada untuk jangka waktu yang lama</span></span></span><br />
                <span style="font-size:11pt"><span style="font-family:Arial"><span style="color:#000000">Untuk memaksimalkan bangunan yang ada, kita bisa memperpanjang masa gunanya. Reruntuhan bangunan yang dibongkar bisa kita gunakan untuk membangun bangunan baru. Dengan melakukan hal itu, kita bisa meningkatkan efisiensi penggunaan sumber daya pada produksi atau pembangunan.&nbsp;</span></span></span><br />
                &nbsp;</li>
                <li style="list-style-type:decimal"><span style="font-size:11pt"><span style="font-family:Arial"><span style="color:#000000">Mendaur ulang barang yang tidak terpakai</span></span></span><br />
                <span style="font-size:11pt"><span style="font-family:Arial"><span style="color:#000000">Kita bisa mendaur ulang barang-barang yang sulit terurai, seperti plastik, kertas, kayu, dan serat sintetis. Banyak negara yang sudah menerapkan peraturan daur ulang untuk mempromosikan aksi tersebut. Dengan mendaur ulang bahan sulit terurai, kita bisa memangkas 1.23 miliar ton gas efek rumah kaca dan menyimpan 2.18 miliar ton bahan baku.<br />
                &nbsp;</span></span></span></li>
                <li style="list-style-type:decimal"><span style="font-size:11pt"><span style="font-family:Arial"><span style="color:#000000">Mengurangi intensitas bepergian</span></span></span><br />
                <span style="font-size:11pt"><span style="font-family:Arial"><span style="color:#000000">Semenjak pandemi, banyak negara menutup akses bepergian, menerapkan jam malam, dan menerapkan batasan bepergian untuk mengurangi intensitas bepergian. Untuk beradaptasi dengan kebijakan tersebut, kita terpaksa bekerja dari rumah secara virtual. Ternyata, dengan mengurangi intensitas bepergian efektif untuk mengurangi emisi. Polusi dari kendaraan menurun. Meskipun pandemi sudah tidak separah beberapa tahun yang lalu, kerja dari rumah bisa menjadi salah satu solusi untuk memangkas emisi.</span></span></span></li>
            </ol>
            
            <p><span style="font-size:11pt"><span style="font-family:Arial"><span style="color:#000000">6 aksi di atas bisa kita terapkan untuk membantu bumi kita yang sudah di ambang keparahan perubahan iklim. Dengan aksi-aksi tersebut, kita bisa mengurangi emisi dan limbah sehingga bumi dapat sedikit demi sedikit pulih, menjadikan bumi rumah yang aman dan nyaman bagi jutaan manusia termasuk kita. </span></span></span></p>
            
            <p>&nbsp;</p>
            ',
        ];

        NewsArticle::create($news3);
    }
}
