<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Models\Apartment;
use App\Models\Image; 

class ImagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @param  Faker  $faker
     * @return void
     */
    public function run(Faker $faker)
    {
        // $apartments = Apartment::all();

        // foreach ($apartments as $apartment) {

        //     $numPhotos = $faker->numberBetween(3, 9);

        //     for ($i = 0; $i < $numPhotos; $i++) {
        //         $photo = new image();
        //         $photo->apartment_id = $apartment->id;
        //         $photo->image = $faker->imageUrl(); 
        //         $photo->save();
        //     }
        // }
        $photo11 = new Image();
        $photo11->apartment_id = 1;
        $photo11->image = 'https://a0.muscache.com/im/pictures/miso/Hosting-956228322388039322/original/03dc4bd0-5bc4-4ac7-b114-39797c177b9c.jpeg?im_w=720'; 
        $photo11->save();

        $photo12 = new Image();
        $photo12->apartment_id = 1;
        $photo12->image = 'https://a0.muscache.com/im/pictures/miso/Hosting-956228322388039322/original/0c89cc99-93e6-4f5f-b26a-ef9bd8da011f.jpeg?im_w=720'; 
        $photo12->save();

        $photo13 = new Image();
        $photo13->apartment_id = 1;
        $photo13->image = 'https://a0.muscache.com/im/pictures/miso/Hosting-956228322388039322/original/314527a9-7f92-4cad-b0dd-0cf409ee946a.jpeg?im_w=720'; 
        $photo13->save();

        $photo14 = new Image();
        $photo14->apartment_id = 1;
        $photo14->image = 'https://a0.muscache.com/im/pictures/miso/Hosting-956228322388039322/original/e232270d-6085-4ac5-bc66-75c0147227b1.jpeg?im_w=720'; 
        $photo14->save();

        $photo21 = new Image();
        $photo21->apartment_id = 2;
        $photo21->image = 'https://a0.muscache.com/im/pictures/miso/Hosting-933794710674073616/original/9e552ca1-ce82-42eb-a783-82f93fdd2b0b.jpeg?im_w=720'; 
        $photo21->save();

        $photo21 = new Image();
        $photo21->apartment_id = 2;
        $photo21->image = 'https://a0.muscache.com/im/pictures/miso/Hosting-933794710674073616/original/21964d93-931e-43f2-9319-73c4c1370b77.jpeg?im_w=720'; 
        $photo21->save();
        
        $photo21 = new Image();
        $photo21->apartment_id = 2;
        $photo21->image = 'https://a0.muscache.com/im/pictures/miso/Hosting-933794710674073616/original/0e120813-32ab-4dbe-92de-66d345bed5e0.jpeg?im_w=720'; 
        $photo21->save();

        $photo21 = new Image();
        $photo21->apartment_id = 2;
        $photo21->image = 'https://a0.muscache.com/im/pictures/miso/Hosting-933794710674073616/original/d747e6e1-8612-481a-8fa9-18cd8aa689a1.jpeg?im_w=720'; 
        $photo21->save();

        $photo31 = new Image();
        $photo31->apartment_id = 3;
        $photo31->image = 'https://a0.muscache.com/im/pictures/miso/Hosting-1102227215773470197/original/fafc25c0-6250-448b-8a78-4ecf982d3969.jpeg?im_w=720'; 
        $photo31->save();

        $photo32 = new Image();
        $photo32->apartment_id = 3;
        $photo32->image = 'https://a0.muscache.com/im/pictures/miso/Hosting-1102227215773470197/original/461f11ed-5894-404c-93ea-b2e70259c1b7.jpeg?im_w=720'; 
        $photo32->save();
        
        $photo33 = new Image();
        $photo33->apartment_id = 3;
        $photo33->image = 'https://a0.muscache.com/im/pictures/miso/Hosting-1102227215773470197/original/35462a5a-cfc7-4fad-82c8-10ff59ede63f.jpeg?im_w=720'; 
        $photo33->save();

        $photo34 = new Image();
        $photo34->apartment_id = 3;
        $photo34->image = 'https://a0.muscache.com/im/pictures/miso/Hosting-1102227215773470197/original/84026c04-398d-4f4c-8e86-3c55a179ad84.jpeg?im_w=720'; 
        $photo34->save();

        $photo41 = new Image();
        $photo41->apartment_id = 4;
        $photo41->image = 'https://a0.muscache.com/im/pictures/hosting/Hosting-U3RheVN1cHBseUxpc3Rpbmc6MTE4MTgzMTcxNzY3MjA0NDIzMw%3D%3D/original/9992c497-2795-4cd8-a0b7-d6084d37f016.jpeg?im_w=720'; 
        $photo41->save();

        $photo42 = new Image();
        $photo42->apartment_id = 4;
        $photo42->image = 'https://a0.muscache.com/im/pictures/hosting/Hosting-U3RheVN1cHBseUxpc3Rpbmc6MTE4MTgzMTcxNzY3MjA0NDIzMw%3D%3D/original/f906b52b-d28a-443b-bce9-8c60e50f1f9e.jpeg?im_w=720'; 
        $photo42->save();
        
        $photo43 = new Image();
        $photo43->apartment_id = 4;
        $photo43->image = 'https://a0.muscache.com/im/pictures/hosting/Hosting-U3RheVN1cHBseUxpc3Rpbmc6MTE4MTgzMTcxNzY3MjA0NDIzMw%3D%3D/original/e94e970b-8239-4e8c-94ec-e3be22865732.jpeg?im_w=720'; 
        $photo43->save();

        $photo44 = new Image();
        $photo44->apartment_id = 4;
        $photo44->image = 'https://a0.muscache.com/im/pictures/hosting/Hosting-U3RheVN1cHBseUxpc3Rpbmc6MTE4MTgzMTcxNzY3MjA0NDIzMw%3D%3D/original/91a999db-a49b-4043-8fe1-78016c699089.jpeg?im_w=720'; 
        $photo44->save();

        $photo51 = new Image();
        $photo51->apartment_id = 5;
        $photo51->image = 'https://a0.muscache.com/im/pictures/prohost-api/Hosting-1092617355496270460/original/e9773c0d-4390-4e43-b4ed-63cb170a1aa5.jpeg?im_w=720'; 
        $photo51->save();

        $photo52 = new Image();
        $photo52->apartment_id = 5;
        $photo52->image = 'https://a0.muscache.com/im/pictures/prohost-api/Hosting-1092617355496270460/original/bd2da2ff-e04f-4f78-93a7-c6baceb67dc5.jpeg?im_w=720'; 
        $photo52->save();
        
        $photo53 = new Image();
        $photo53->apartment_id = 5;
        $photo53->image = 'https://a0.muscache.com/im/pictures/prohost-api/Hosting-1092617355496270460/original/da8d0439-adfa-441c-a75c-0159259f761d.jpeg?im_w=720'; 
        $photo53->save();

        $photo54 = new Image();
        $photo54->apartment_id = 5;
        $photo54->image = 'https://a0.muscache.com/im/pictures/prohost-api/Hosting-1092617355496270460/original/752280b0-8fad-475f-bf28-ddf65808f351.jpeg?im_w=720'; 
        $photo54->save();

        $photo61 = new Image();
        $photo61->apartment_id = 6;
        $photo61->image = 'https://a0.muscache.com/im/pictures/miso/Hosting-909162726572829721/original/e2e8134a-4ae9-4e2f-bf1c-7def1436b184.jpeg?im_w=720'; 
        $photo61->save();

        $photo62 = new Image();
        $photo62->apartment_id = 6;
        $photo62->image = 'https://a0.muscache.com/im/pictures/miso/Hosting-909162726572829721/original/98358243-e45f-4066-a331-408812ff638a.jpeg?im_w=720'; 
        $photo62->save();
        
        $photo63 = new Image();
        $photo63->apartment_id = 6;
        $photo63->image = 'https://a0.muscache.com/im/pictures/miso/Hosting-909162726572829721/original/7c189fdd-8afc-48ef-9cb1-71fde6aad1ac.jpeg?im_w=720'; 
        $photo63->save();

        $photo64 = new Image();
        $photo64->apartment_id = 6;
        $photo64->image = 'https://a0.muscache.com/im/pictures/miso/Hosting-909162726572829721/original/b4cb26e9-8213-46aa-9f20-ef7788e4e378.jpeg?im_w=720'; 
        $photo64->save();

        $photo71 = new Image();
        $photo71->apartment_id = 7;
        $photo71->image = 'https://a0.muscache.com/im/pictures/miso/Hosting-1130332951551440501/original/17b918e2-b994-4ce1-8449-9443759aaab1.jpeg?im_w=720'; 
        $photo71->save();

        $photo72 = new Image();
        $photo72->apartment_id = 7;
        $photo72->image = 'https://a0.muscache.com/im/pictures/miso/Hosting-1130332951551440501/original/6c99a70b-0f85-4a5b-b06c-706a627deb6c.jpeg?im_w=720'; 
        $photo72->save();
        
        $photo73 = new Image();
        $photo73->apartment_id = 7;
        $photo73->image = 'https://a0.muscache.com/im/pictures/miso/Hosting-1130332951551440501/original/da395c64-bf31-4ba0-9469-1437eca3c3a0.jpeg?im_w=720'; 
        $photo73->save();

        $photo74 = new Image();
        $photo74->apartment_id = 7;
        $photo74->image = 'https://a0.muscache.com/im/pictures/miso/Hosting-1130332951551440501/original/2ed78b51-ddf1-40ce-ba1b-59f9028127dd.jpeg?im_w=720'; 
        $photo74->save();

        $photo81 = new Image();
        $photo81->apartment_id = 8;
        $photo81->image = 'https://a0.muscache.com/im/pictures/miso/Hosting-933794710674073616/original/9e552ca1-ce82-42eb-a783-82f93fdd2b0b.jpeg?im_w=720'; 
        $photo81->save();

        $photo82 = new Image();
        $photo82->apartment_id = 8;
        $photo82->image = 'https://a0.muscache.com/im/pictures/miso/Hosting-933794710674073616/original/21964d93-931e-43f2-9319-73c4c1370b77.jpeg?im_w=720'; 
        $photo82->save();
        
        $photo83 = new Image();
        $photo83->apartment_id = 8;
        $photo83->image = 'https://a0.muscache.com/im/pictures/miso/Hosting-933794710674073616/original/0e120813-32ab-4dbe-92de-66d345bed5e0.jpeg?im_w=720'; 
        $photo83->save();

        $photo84 = new Image();
        $photo84->apartment_id = 8;
        $photo84->image = 'https://a0.muscache.com/im/pictures/miso/Hosting-933794710674073616/original/d747e6e1-8612-481a-8fa9-18cd8aa689a1.jpeg?im_w=720'; 
        $photo84->save();

        $photo91 = new Image();
        $photo91->apartment_id = 9;
        $photo91->image = 'https://a0.muscache.com/im/pictures/69544009/539f37f3_original.jpg?im_w=720'; 
        $photo91->save();

        $photo92 = new Image();
        $photo92->apartment_id = 9;
        $photo92->image = 'https://a0.muscache.com/im/pictures/69543881/62d8409d_original.jpg?im_w=720'; 
        $photo92->save();
        
        $photo93 = new Image();
        $photo93->apartment_id = 9;
        $photo93->image = 'https://a0.muscache.com/im/pictures/70198346/830f3529_original.jpg?im_w=720'; 
        $photo93->save();

        $photo94 = new Image();
        $photo94->apartment_id = 9;
        $photo94->image = 'https://a0.muscache.com/im/pictures/84577347/6aabc58c_original.jpg?im_w=720'; 
        $photo94->save();

        $photo110 = new Image();
        $photo110->apartment_id = 10;
        $photo110->image = 'https://evergreens.it/wp-content/uploads/2023/09/ispirazioni-ufficio-piante-artificiali-arredo-1300x680_c.jpg'; 
        $photo110->save();

        $photo120 = new Image();
        $photo120->apartment_id = 10;
        $photo120->image = 'https://www.green.it/wp-content/uploads/2021/10/green-ufficio-verde.jpg'; 
        $photo120->save();
        
        $photo130 = new Image();
        $photo130->apartment_id = 10;
        $photo130->image = 'https://media.pianetadesign.it/images/2020/07/Ufficio-moderno-6.jpg'; 
        $photo130->save();

        $photo140 = new Image();
        $photo140->apartment_id = 10;
        $photo140->image = 'https://media.pianetadesign.it/images/2020/07/Ufficio-moderno-1.jpg'; 
        $photo140->save();

        $photo111 = new Image();
        $photo111->apartment_id = 11;
        $photo111->image = 'https://a0.muscache.com/im/pictures/hosting/Hosting-1126489657627869050/original/468ad175-b7aa-400e-8a61-b462e42d67d4.jpeg?im_w=720'; 
        $photo111->save();

        $photo112 = new Image();
        $photo112->apartment_id = 11;
        $photo112->image = 'https://a0.muscache.com/im/pictures/hosting/Hosting-1126489657627869050/original/274349cb-8c43-443a-8c20-78620057569d.jpeg?im_w=720'; 
        $photo112->save();
        
        $photo113 = new Image();
        $photo113->apartment_id = 11;
        $photo113->image = 'https://a0.muscache.com/im/pictures/hosting/Hosting-1126489657627869050/original/01eb219b-2db9-437d-bd03-572eb3d457a3.jpeg?im_w=720'; 
        $photo113->save();

        $photo114 = new Image();
        $photo114->apartment_id = 11;
        $photo114->image = 'https://a0.muscache.com/im/pictures/hosting/Hosting-1126489657627869050/original/d0b324d4-8ed1-4fe0-b8ee-270f0b5121c4.jpeg?im_w=720'; 
        $photo114->save();

        $photo121 = new Image();
        $photo121->apartment_id = 12;
        $photo121->image = 'https://a0.muscache.com/im/pictures/hosting/Hosting-1142713955355017474/original/5794fdd9-adca-439b-a413-47787fbf6452.jpeg?im_w=720'; 
        $photo121->save();

        $photo122 = new Image();
        $photo122->apartment_id = 12;
        $photo122->image = 'https://a0.muscache.com/im/pictures/hosting/Hosting-1142713955355017474/original/8dbf3a8d-459c-4fc7-8b7b-1cf33873d6a5.jpeg?im_w=720'; 
        $photo122->save();
        
        $photo123 = new Image();
        $photo123->apartment_id = 12;
        $photo123->image = 'https://a0.muscache.com/im/pictures/hosting/Hosting-1142713955355017474/original/296a7b76-6ca0-4fc9-bf89-3090c26df624.jpeg?im_w=720'; 
        $photo123->save();

        $photo124 = new Image();
        $photo124->apartment_id = 12;
        $photo124->image = 'https://a0.muscache.com/im/pictures/hosting/Hosting-1142713955355017474/original/bbfd7275-d8a6-408f-a70b-9d9bd1dc207d.jpeg?im_w=720'; 
        $photo124->save();

        $photo131 = new Image();
        $photo131->apartment_id = 13;
        $photo131->image = 'https://a0.muscache.com/im/pictures/hosting/Hosting-1076859684695909604/original/dc841420-b569-425e-aa9b-e487a443e45c.jpeg?im_w=720'; 
        $photo131->save();

        $photo132 = new Image();
        $photo132->apartment_id = 13;
        $photo132->image = 'https://a0.muscache.com/im/pictures/hosting/Hosting-1076859684695909604/original/d568eb87-d133-4e45-8a81-0015df6c697d.jpeg?im_w=720'; 
        $photo132->save();

        $photo133 = new Image();
        $photo133->apartment_id = 13;
        $photo133->image = 'https://a0.muscache.com/im/pictures/hosting/Hosting-1076859684695909604/original/53212fc6-7c8f-4bae-bfda-a5d12eafc82f.jpeg?im_w=720'; 
        $photo133->save();

        $photo134 = new Image();
        $photo134->apartment_id = 13;
        $photo134->image = 'https://a0.muscache.com/im/pictures/hosting/Hosting-1076859684695909604/original/56297930-0fea-4f57-806b-46b9eae7683b.jpeg?im_w=720'; 
        $photo134->save();

        $photo141 = new Image();
        $photo141->apartment_id = 14;
        $photo141->image = 'https://a0.muscache.com/im/pictures/hosting/Hosting-U3RheVN1cHBseUxpc3Rpbmc6NzEwNjAwOTAwMDUwMzMyMDA3/original/55b1a7d6-496d-44a1-b0e6-a72433c28e9d.jpeg?im_w=720'; 
        $photo141->save();

        $photo142 = new Image();
        $photo142->apartment_id = 14;
        $photo142->image = 'https://a0.muscache.com/im/pictures/39cbf018-95b3-4d61-af28-16d7c85ef8d7.jpg?im_w=720'; 
        $photo142->save();

        $photo143 = new Image();
        $photo143->apartment_id = 14;
        $photo143->image = 'https://a0.muscache.com/im/pictures/83cfd698-0723-40ee-8bdb-ceb0765f5fc4.jpg?im_w=1200'; 
        $photo143->save();

        $photo144 = new Image();
        $photo144->apartment_id = 14;
        $photo144->image = 'https://a0.muscache.com/im/pictures/625916d1-c4c6-40dc-86cf-ba8c32342f91.jpg?im_w=1200'; 
        $photo144->save();

        $photo151 = new Image();
        $photo151->apartment_id = 15;
        $photo151->image = 'https://a0.muscache.com/im/pictures/prohost-api/Hosting-851139798615091047/original/2c40b4d9-813f-49a8-acec-a02d3797751a.jpeg?im_w=720'; 
        $photo151->save();

        $photo152 = new Image();
        $photo152->apartment_id = 15;
        $photo152->image = 'https://a0.muscache.com/im/pictures/prohost-api/Hosting-851139798615091047/original/57efbfb3-f3fd-456d-b667-8b4dd53b5577.jpeg?im_w=720'; 
        $photo152->save();

        $photo153 = new Image();
        $photo153->apartment_id = 15;
        $photo153->image = 'https://a0.muscache.com/im/pictures/prohost-api/Hosting-851139798615091047/original/c1a7dd6e-57a8-45fd-a77d-270b6cd44fb2.jpeg?im_w=720'; 
        $photo153->save();

        $photo154 = new Image();
        $photo154->apartment_id = 15;
        $photo154->image = 'https://a0.muscache.com/im/pictures/prohost-api/Hosting-851139798615091047/original/5f6ac9de-8b94-4f60-9a57-c02d1d37cf82.jpeg?im_w=720'; 
        $photo154->save();

        $photo161 = new Image();
        $photo161->apartment_id = 16;
        $photo161->image = 'https://a0.muscache.com/im/pictures/miso/Hosting-770173449655278304/original/0caf5485-9693-438d-8571-ab6a5266a23d.jpeg?im_w=720'; 
        $photo161->save();

        $photo162 = new Image();
        $photo162->apartment_id = 16;
        $photo162->image = 'https://a0.muscache.com/im/pictures/miso/Hosting-770173449655278304/original/22dbd2c5-26e0-4c22-9c25-81bf4e922053.jpeg?im_w=720'; 
        $photo162->save();

        $photo163 = new Image();
        $photo163->apartment_id = 16;
        $photo163->image = 'https://a0.muscache.com/im/pictures/miso/Hosting-770173449655278304/original/d96334b4-840b-4231-8450-93999bc37d31.jpeg?im_w=1200'; 
        $photo163->save();

        $photo164 = new Image();
        $photo164->apartment_id = 16;
        $photo164->image = 'https://a0.muscache.com/im/pictures/miso/Hosting-770173449655278304/original/e8f1b21a-8e39-43f9-9432-f667c7408336.jpeg?im_w=720'; 
        $photo164->save();

        $photo171 = new Image();
        $photo171->apartment_id = 17;
        $photo171->image = 'https://a0.muscache.com/im/pictures/hosting/Hosting-1102274149576621102/original/073b371a-3c07-47f4-bf6b-4161eacd29ab.jpeg?im_w=960'; 
        $photo171->save();

        $photo172 = new Image();
        $photo172->apartment_id = 17;
        $photo172->image = 'https://a0.muscache.com/im/pictures/hosting/Hosting-1102274149576621102/original/dc396276-e18a-44f7-91bf-b7051d49b53b.jpeg?im_w=720'; 
        $photo172->save();

        $photo173 = new Image();
        $photo173->apartment_id = 17;
        $photo173->image = 'https://a0.muscache.com/im/pictures/hosting/Hosting-1102274149576621102/original/b74bb6a9-0e4a-48a7-9931-0514b57c61b7.jpeg?im_w=720'; 
        $photo173->save();

        $photo174 = new Image();
        $photo174->apartment_id = 17;
        $photo174->image = 'https://a0.muscache.com/im/pictures/hosting/Hosting-1102274149576621102/original/51aa64a8-47d0-470d-bb37-a09eb79468f1.jpeg?im_w=720'; 
        $photo174->save();

        $photo181 = new Image();
        $photo181->apartment_id = 18;
        $photo181->image = 'https://a0.muscache.com/im/pictures/miso/Hosting-36782249/original/5bf1b8d3-e21c-493c-92af-cb7a1bfbbf8e.jpeg?im_w=720'; 
        $photo181->save();

        $photo182 = new Image();
        $photo182->apartment_id = 18;
        $photo182->image = 'https://a0.muscache.com/im/pictures/miso/Hosting-36782249/original/dcb847a5-e550-410c-a177-f2c8e4e2a2fe.jpeg?im_w=720'; 
        $photo182->save();

        $photo183 = new Image();
        $photo183->apartment_id = 18;
        $photo183->image = 'https://a0.muscache.com/im/pictures/miso/Hosting-36782249/original/b551f31f-5463-4fa2-a5b3-1bb8a109a6ae.jpeg?im_w=720'; 
        $photo183->save();

        $photo184 = new Image();
        $photo184->apartment_id = 18;
        $photo184->image = 'https://a0.muscache.com/im/pictures/miso/Hosting-36782249/original/44c0eb6b-4dd5-40b1-837a-f8f3478decf1.jpeg?im_w=720'; 
        $photo184->save();

        $photo191 = new Image();
        $photo191->apartment_id = 19;
        $photo191->image = 'https://a0.muscache.com/im/pictures/miso/Hosting-673087779772592652/original/b5d8c8f7-5f84-4bed-8bc5-5cb210660007.jpeg?im_w=720'; 
        $photo191->save();

        $photo192 = new Image();
        $photo192->apartment_id = 19;
        $photo192->image = 'https://a0.muscache.com/im/pictures/miso/Hosting-673087779772592652/original/5ee83633-7823-49a1-a922-5c9356c44217.jpeg?im_w=720'; 
        $photo192->save();

        $photo193 = new Image();
        $photo193->apartment_id = 19;
        $photo193->image = 'https://a0.muscache.com/im/pictures/miso/Hosting-673087779772592652/original/18d003d3-2ac8-4a21-a08a-a7e624444399.jpeg?im_w=720'; 
        $photo193->save();

        $photo194 = new Image();
        $photo194->apartment_id = 19;
        $photo194->image = 'https://a0.muscache.com/im/pictures/miso/Hosting-673087779772592652/original/496d25f6-bff5-4b96-953d-c03bc58f90c3.jpeg?im_w=720'; 
        $photo194->save();

        $photo201 = new Image();
        $photo201->apartment_id = 20;
        $photo201->image = 'https://a0.muscache.com/im/pictures/miso/Hosting-1039950206113084332/original/6fe37c9e-d2e4-4db5-942b-26374ce33b54.jpeg?im_w=720'; 
        $photo201->save();

        $photo202 = new Image();
        $photo202->apartment_id = 20;
        $photo202->image = 'https://a0.muscache.com/im/pictures/miso/Hosting-1039950206113084332/original/76fd91e6-d32b-4733-ba0d-95d871c17078.jpeg?im_w=720'; 
        $photo202->save();

        $photo203 = new Image();
        $photo203->apartment_id = 20;
        $photo203->image = 'https://a0.muscache.com/im/pictures/miso/Hosting-1039950206113084332/original/2713ca61-7619-4008-9eaa-bca8a917a4b0.jpeg?im_w=720'; 
        $photo203->save();

        $photo204 = new Image();
        $photo204->apartment_id = 20;
        $photo204->image = 'https://a0.muscache.com/im/pictures/miso/Hosting-1039950206113084332/original/83c83ffe-651f-4ff3-969d-a01e4936130d.jpeg?im_w=720'; 
        $photo204->save();
    }
}
