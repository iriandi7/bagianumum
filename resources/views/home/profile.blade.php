@extends('home.home_template')


@section('main')
    <div class="space-y-5">
        <div class="card">
            <div class="card-body flex flex-col p-6">
                <header class="flex mb-5 items-center border-b border-slate-100 dark:border-slate-700 pb-5 -mx-6 px-6">
                    <div class="flex-1">
                        <div class="card-title text-slate-900 dark:text-white">{{ $title }}</div>
                    </div>
                </header>
                <div class="card-text h-full ">
                    <p class="text-slate-600 dark:text-slate-300 text-base font-xs font-normal text-left t px-6 py-4">
                        Bagian Umum sebagai lembaga yang mendukung Walikota dalam mewujudkan Visi Kota Batu
                        dengan berdasar pada prinsip-prinsip good governance yang efektif dan transparan serta mengembangkan
                        peluang dan inovasi baru. Bagian Umum Sekretariat Daerah Kota Batu harus mempunyai visi sebagai cara
                        pandang jauh kedepan tentang kemana akan diarahkan dan apa yang akan dicapai agar dapat eksis,
                        antipatif terhadap iklim pemerintahan dan sosial yang cepat berubah. Adapun Visi Bagian Umum
                        Sekretariat Daerah Kota Batu adalah mendukung Misi kelima yaitu :
                    </p>
                    <p class="text-slate-600 dark:text-slate-300 text-base font-xs font-normal text-left t px-6 py-4">
                        Meningkatkan Tata Kelola Pemerintahan Yang Baik, Bersih dan Akuntabel Berorientasi
                        pada Pelayanan Publik Yang Profesional
                    </p>
                    <p class="text-slate-600 dark:text-slate-300 text-base font-xs font-normal text-left t px-6 py-4">
                        Di dalam pernyataan visi tersebut di atas terdapat kata-kata kunci sebagai berikut :
                    </p>
                    <ul class="space-y-3 p-6 rounded-md bg-slate-50 dark:bg-slate-700">
                        <li
                            class="text-sm text-slate-900 dark:text-slate-300 flex space-x-2 items-center rtl:space-x-reverse">
                            <iconify-icon class="relative top-[1px]" icon="heroicons-outline:chevron-right"></iconify-icon>
                            <span>
                                Baik artinya tertib administrasi sehingga kegiatan tata usaha kantor tertib dengan tujuan
                                untuk
                                pengarsipan berkas agar tidak tumpang tindih
                            </span>
                        </li>
                        <li
                            class="text-sm text-slate-900 dark:text-slate-300 flex space-x-2 items-center rtl:space-x-reverse">
                            <iconify-icon class="relative top-[1px]" icon="heroicons-outline:chevron-right"></iconify-icon>
                            <span>
                                Bersih mengandung arti tidak terkait korupsi, kolusi dan nepotisme, tidak menerima suap
                                dalam
                                bentuk apapun.
                            </span>
                        </li>
                        <li
                            class="text-sm text-slate-900 dark:text-slate-300 flex space-x-2 items-center rtl:space-x-reverse">
                            <iconify-icon class="relative top-[1px]" icon="heroicons-outline:chevron-right"></iconify-icon>
                            <span>
                                Akuntabel mengandung maknadata yang ada dan terekam terekam benar-benar valid, sesuai
                                peraturan
                                yang berlaku dan dapat dipertanggungjawabkan
                            </span>
                        </li>
                        <li
                            class="text-sm text-slate-900 dark:text-slate-300 flex space-x-2 items-center rtl:space-x-reverse">
                            <iconify-icon class="relative top-[1px]" icon="heroicons-outline:chevron-right"></iconify-icon>
                            <span>
                                Profesional mengandung makna sikap yang mengacu pada peningkatan kualitas dalam pekerjaan.
                                Profesional merupakan suatu tuntutan bagi seseorang yang sedang mengemban tugasnya agar
                                mendapatkan hasil yang optimal.untuk mencapai sukses dalam bekerja, seseorang harus mampu
                                bersikap profesional. Karena profesional merupakan bagian dari proses, fokus kepada hasil
                                kerja,
                                dan berorientasi kepada pelayanan.
                            </span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
