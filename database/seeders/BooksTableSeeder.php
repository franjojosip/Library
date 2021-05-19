<?php

namespace Database\Seeders;

use App\Models\Book;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Book::create([
            'name' => 'Iz velegradskog podzemlja',
            'description' => 'Novakova pripovijetka “Iz velegradskog podzemlja” na vješt način progovara o raznim problemima radničkog sloja u Zagrebu, na prijelazu iz 19. u 20. st. Novak donosi problematiku siromaštva, predrasuda o siromasima, kao i problem pijanstva koje je, na neki način, pokretač radnje ove pripovjetke. Baš kao i većina Novakovih djela, ova pripovijetka donosi socijalnu tematiku.',
            'image_url' => 'https://i.gr-assets.com/images/S/compressed.photo.goodreads.com/books/1333638795i/12352684._UY383_SS383_.jpg',
            'published_at' => Carbon::create('2009', '01', '01'),
            'author_id' => '1',
            'genre_id' => '3',
            'publisher_id' => '1',
            'total_copies' => '3'
        ]);
        Book::create([
            'name' => 'Posljednji Stipančići',
            'description' => 'Roman prikazuje propadanje senjskih patricija u prvim desetljećima 19. stoljeća u kojem se prati generacijsko kretanje obitelji Stipančić, s posebnim usmjerenjem na posljednja dva naraštaja. Nejednak položaj djece u obitelji u kojoj se sva pozornost pridaje jednoj, a potpuno zapostavlja druga osoba, pa je roman svojevrsna analiza socijalnih, moralnih i psiholoških sastavnica tadašnjega hrvatskoga društva.',
            'image_url' => 'https://i.gr-assets.com/images/S/compressed.photo.goodreads.com/books/1456093456l/27607353.jpg',
            'published_at' => Carbon::create('1973', '01', '01'),
            'author_id' => '1',
            'genre_id' => '3',
            'publisher_id' => '3',
            'total_copies' => '3'
        ]);
        Book::create([
            'name' => 'U glib i druge pripovijesti',
            'description' => 'Zbirka sadrži pet pripovijetki: "Lutrijašica", "U glib", "Nezasitnost i bijeda", "Iz velegradskog podzemlja" i "Pripovijest o Marcelu Remeniću". Opisujući razne društvene slojeve i prilike, različite krajeve i ljude, uglavnom obespravljene i siromašne, pisac koji je jedan od najplodnijih hrvatskih realista, na izuzetno vješt način progovara o životnim nedaćama i nepravdama izazivajući sućut brojnih naraštaja čitatelja. Metodički instrumentarij olakšava razumijevanje djela, a obuhvaća analizu svake od pripovjedaka.',
            'image_url' => 'http://www.logovita.ba/1306-thickbox_default/u-glib-i-druge-pripovijetke.jpg',
            'published_at' => Carbon::create('2003', '01', '01'),
            'author_id' => '1',
            'genre_id' => '3',
            'publisher_id' => '4',
            'total_copies' => '3'
        ]);
        Book::create([
            'name' => 'Pred svjetlom i druge pripovijesti',
            'description' => 'Ovaj je autor, među prvim značajnijim hrvatskim piscima 19. stoljeća, svojim djelima, poglavito pripovijestima, u hrvatsku književnost uveo socijalnu tematiku. U knjizi su objavljene njegova najduža pripovijest "Pred svjetlom", zatim "Nezasitnost i bijeda", "Iz velegradskog podzemlja", te jedina ne socijalne tematike "Pripovijest o Marcelu Remeniću".',
            'image_url' => 'https://www.knjiga.ba/media/catalog/product/cache/1/image/9df78eab33525d08d6e5fb8d27136e95/slike/pred_svjetlom.jpg',
            'published_at' => Carbon::create('2000', '01', '01'),
            'author_id' => '1',
            'genre_id' => '3',
            'publisher_id' => '5',
            'total_copies' => '3'
        ]);
        Book::create([
            'name' => 'Povratak Filipa Latinovicza',
            'description' => 'Djelo čine izvanredne, no iznimno teške komponente (riječi) koje Krleža koristi bez nekakvog smisla, a Julije Benešić je njegov jezik opisao kao “begovićijanski kuchelkroatiš izrazi” koji, bez nužne potrebe, unosi u djelo koje, na kraju krajeva, biva prenatrpano riječima koje ne znače i ne govore ništa. Uglavnom takvu vrstu stila i jezika nalazimo u simfonijama, a Krleža ne pazi ni na kultiviranje lijepih izraza ili općenitu kulturu ponašanja uvodeći “purgerske”, pomalo proste literarne elemente, dok mu je konstrukcija samih rečenica bazirana na njemačkom jezik, a svakako se osjeća i nervoza autora koji želi sve napisati u kratkom vremenu. Za razliku od tehnika koje viđamo u klasičnim romanima sa sličnim protagonistima, narator proporcionalno manje koristi ulogu pisca koji sve zna.',
            'image_url' => 'http://pdfknjige.net/uploads/povratak%20filipa%20latinovica.jpg',
            'published_at' => Carbon::create('1947', '01', '01'),
            'author_id' => '2',
            'genre_id' => '3',
            'publisher_id' => '2',
            'total_copies' => '3'
        ]);
        Book::create([
            'name' => 'Zastave',
            'description' => 'Zastave su posljednji roman Miroslava Krleže. Prvi put je izdan u nastavcima u književnom časopisu Forum 1962., a konačan oblik izdanja u pet knjiga dobiva 1976. Roman prati nacionalna zbivanja u Hrvatskoj, Mađarskoj i Srbiji u prvoj trećini 20. st. i usporedo s njima intimu Kamila Emeričkoga, predstavnika zagrebačke elite i centralne ličnosti Zastava. ',
            'image_url' => 'https://www.zuzi.hr/wp-content/uploads/2020/08/miroslav-krleza-zastave-5-slika-135433551.jpg',
            'published_at' => Carbon::create('1979', '01', '01'),
            'author_id' => '2',
            'genre_id' => '3',
            'publisher_id' => '2',
            'total_copies' => '3'
        ]);
        Book::create([
            'name' => 'Na rubu pameti',
            'description' => 'Pripovjedač i protagonist je doktor prava koji dolazi u sukob s građanskim zagrebačkim društvom licemjerja kojem je i sam pripadao. Biva izopćen i završava u zatvoru. Zbivanja o kojima pripovijeda se odvijaju kroz dvije godine. Tema je označena na samom početku kao »ljudska glupost«. Roman se sastoji od međusobno slabo povezanih epizoda. Neke uvode paralelna zbivanja vezana uz pojedine likove koji zatim nestaju i prepuštaju mjesto drugima.',
            'image_url' => 'https://mozaik-knjiga.hr/wp-content/uploads/2021/01/NaRubuPameti-web.jpg',
            'published_at' => Carbon::create('2000', '01', '01'),
            'author_id' => '2',
            'genre_id' => '3',
            'publisher_id' => '4',
            'total_copies' => '3'
        ]);
        Book::create([
            'name' => 'Gospoda Glembajevi',
            'description' => 'Gospoda Glembajevi, drama Miroslava Krleže iz 1929. godine, najbolje je opisana njegovim vlastitim riječima: “Glembajevi su neka vrsta dekorativnog panoa naslikanog po motivu jedne građanske civilizacije na odlasku u agoniju, i imaju karakter poetskog lirskog poniranja u sve elemente takozvane psihološke drame.”',
            'image_url' => 'https://upload.wikimedia.org/wikipedia/hr/0/08/Gospoda_glembajevi.jpg',
            'published_at' => Carbon::create('2008', '01', '01'),
            'author_id' => '2',
            'genre_id' => '3',
            'publisher_id' => '5',
            'total_copies' => '3'
        ]);
        Book::create([
            'name' => 'Pepeo srca',
            'description' => 'Budući da opus Tina Ujevića ubrajamo među najveće u hrvatskoj književnosti, izbor od dvjestotinjak stranica bila je teška zadaća. Knjiga sadrži: pjesme, pjesničke proze, prozu i prepjeve.',
            'image_url' => 'https://www.njuskalo.hr/image-w920x690/antikvarne-knjige/dragutin-tadijanovic-pepeo-srca-zagreb-1936-1-izdanje-slika-29108762.jpg',
            'published_at' => Carbon::create('1936', '01', '01'),
            'author_id' => '3',
            'genre_id' => '16',
            'publisher_id' => '5',
            'total_copies' => '3'
        ]);
        Book::create([
            'name' => 'Dani djetinjstva',
            'description' => 'U radu se pobliže predstavlja ciklus pjesama Dani djetinjstva Dragutina Tadijanovića. Cilj rada je istražiti pripadaju li pjesme iz ovog Tadijanovićevog pjesničkog ciklusa dječjoj poeziji ili poeziji o djetinjstvu odnosno je li riječ o pjesmama namjenjenim djeci ili o Tadijanovićevim pjesničkim sjećanja na vlastito djetinjstvo. Analiza pjesama pokazala je kako je riječ o ciklusu autobiografskog karaktera iz kojeg se, iako opisuju pjesnikova sjećanja na djetinjstvo, većina pjesama može se primijeniti u radu s djecom predškolske dobi.',
            'image_url' => 'https://www.antikvarijat-vremeplov.hr/image/cache/catalog/products_2020/IMG_E9991-800x800.jpg',
            'published_at' => Carbon::create('1937', '01', '01'),
            'author_id' => '3',
            'genre_id' => '16',
            'publisher_id' => '6',
            'total_copies' => '3'
        ]);
        Book::create([
            'name' => 'Ljudi za vratima gostionice, Skalpel kaosa',
            'description' => 'Skalpel kaosa jedna je od dvije zbirke proznih tekstova velikog hrvatskog pjesnika Tina Ujevića. Druga je Ljudi za vratima gostionice. Bio je poliglot i erudit, prevodio je s više jezika. Osim poezije pisao je eseje, feljtone, prozne zapise i studije o domaćim i stranim autorima.',
            'image_url' => 'https://knjiga.hr/wp-content/uploads/product-images/060587/060587.jpg',
            'published_at' => Carbon::create('1986', '01', '01'),
            'author_id' => '4',
            'genre_id' => '4',
            'publisher_id' => '7',
            'total_copies' => '3'
        ]);
        Book::create([
            'name' => 'Priče iz davnine',
            'description' => 'Priče iz davnine, glasovita zbirka od osam pripovijetki-bajki Ivane Brlić-Mažuranić, u kojima je autorica ostvarila svoj književni vrhunac. Zbirka je objavljena 1916. u izdanju Matice hrvatske, a drugo izdanje doživljava 1926. ',
            'image_url' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRnvg37QtR3VptPI6M2CqHtm15vvf4ZLcNuPK-o088GM8CCrGNY',
            'published_at' => Carbon::create('2009', '01', '01'),
            'author_id' => '6',
            'genre_id' => '5',
            'publisher_id' => '7',
            'total_copies' => '3'
        ]);
        Book::create([
            'name' => 'Čudnovate zgode šegrta Hlapića',
            'description' => 'Čudnovate zgode šegrta Hlapića prvi je roman Ivane Brlić-Mažuranić i prvi hrvatski roman za djecu. Objavljen 1913., postao je prototip dječjeg romana u hrvatskoj književnosti. Ima realistično ishodište, ali i karakteristike bajke, utoliko što je stvarni svijet u njemu stiliziran i apstrahiran',
            'image_url' => 'https://znanje.hr/product-images/50cc9ea2-c83c-41eb-b3f5-0c03bc63f62d.jpg',
            'published_at' => Carbon::create('2007', '01', '01'),
            'author_id' => '6',
            'genre_id' => '5',
            'publisher_id' => '6',
            'total_copies' => '3'
        ]);
        Book::create([
            'name' => 'Gordana',
            'description' => 'Gordana - kraljica Hrvata - 12 svezaka. Marija Jurić Zagorka. u dvanaest svesaka povijesna i ljubavna priča o srednjovjekovnoj Hrvatskoj Zagorkina magična ...',
            'image_url' => 'https://s3.eu-central-1.amazonaws.com/cnj-img/images/4w/4wwuKGqfTx7y',
            'published_at' => Carbon::create('1996', '01', '01'),
            'author_id' => '7',
            'genre_id' => '3',
            'publisher_id' => '6',
            'total_copies' => '3'
        ]);
        Book::create([
            'name' => 'Vitez slavonske ravni',
            'description' => 'Vitez slavonske ravni”, roman o tajanstvenom junaku u borbi protiv razbojničkih bandi koje haraju Slavonijom, zanimljiv i zbog toga što je jedini Zagorkin roman koji nije bio smješten u Zagreb.',
            'image_url' => 'https://eknjizara.hr/wp-content/uploads/2018/06/1796_big.jpg',
            'published_at' => Carbon::create('2001', '01', '01'),
            'author_id' => '7',
            'genre_id' => '3',
            'publisher_id' => '8',
            'total_copies' => '3'
        ]);
        Book::create([
            'name' => 'Zore i vihori',
            'description' => 'Zore i vihori, prva objavljena zbirka Vesne Parun. Jedna od najvažnijih zbirki suvremenog hrvatskog pjesništva. Po objavljivanju nije bila prepoznata od službene kritike i bila je osporavana njena umjetnička vrijednost.',
            'image_url' => 'https://www.bibliofil.hr/content/images/thumbs/0000344_vesna-parun-zore-i-vihori_550.jpeg',
            'published_at' => Carbon::create('1989', '01', '01'),
            'author_id' => '8',
            'genre_id' => '16',
            'publisher_id' => '8',
            'total_copies' => '3'
        ]);
        Book::create([
            'name' => 'Hamlet',
            'description' => 'Hamlet je tragedija Williama Shakespearea, jedna od njegovih najpoznatijih i najizvođenijih tragedija na pozornicama širom svijeta.',
            'image_url' => 'http://www.lektire.eu/wp-content/uploads/2011/09/Hamlet.jpg',
            'published_at' => Carbon::create('1990', '01', '01'),
            'author_id' => '9',
            'genre_id' => '4',
            'publisher_id' => '9',
            'total_copies' => '3'
        ]);
        Book::create([
            'name' => 'Romeo i Julija',
            'description' => 'Tema Shakespearove tragedije Romeo i Julija iskrena je, neobuzdana i bezgranična ljubav dvoje mladih čiji su roditelji u krvnoj zavadi. Kad Shakespearove drame ne bi postojale, ne bismo znali koliko duboko književnost može prodrijeti u ljudsku dušu. Shakespeare nas uči da bez istinske ljubavi, za kakvu su živjeli Romeo i Julija, ovaj svijet zapravo i nema pravoga smisla.',
            'image_url' => 'https://mozaik-knjiga.hr/wp-content/uploads/archive/images/9789531401258-205x300.jpg',
            'published_at' => Carbon::create('2002', '01', '01'),
            'author_id' => '9',
            'genre_id' => '4',
            'publisher_id' => '9',
            'total_copies' => '1'
        ]);
        Book::create([
            'name' => 'Rat i mir',
            'description' => 'Rat i mir epski je roman Lava Nikolajeviča Tolstoja objavljen između 1865. i 1869. Prikazuje rusko društvo tijekom Napoleonovog razdoblja.',
            'image_url' => 'https://antikvarijat-bono.com/wp-content/uploads/2017/05/2081508068418648066883823768_scan0361.jpg',
            'published_at' => Carbon::create('2017', '01', '01'),
            'author_id' => '10',
            'genre_id' => '10',
            'publisher_id' => '9',
            'total_copies' => '1'
        ]);
        Book::create([
            'name' => 'Ana Karenjina',
            'description' => 'Ana Karenjina je roman ruskog pisca Lava Nikolajeviča Tolstoja, koji je prvobitno objavljivan u dijelovima od 1873. do 1877. godine. Prva pojava romana je bila u „Ruskom glasniku“, ali nije objavljen do kraja, pošto je Tolstoj došao u sukob s urednikom Mihailom Katkovim oko pitanja koja su pokrenuta u završnom dijelu',
            'image_url' => 'https://encrypted-tbn1.gstatic.com/images?q=tbn:ANd9GcRvZFd27wwYzQ_1IXkVC7zUyk3PjCSAFRhckIC-yAosqYfgavhs',
            'published_at' => Carbon::create('1946', '01', '01'),
            'author_id' => '10',
            'genre_id' => '10',
            'publisher_id' => '11',
            'total_copies' => '1'
        ]);
        Book::create([
            'name' => 'Zločin i kazna',
            'description' => 'Zločin i kazna je roman ruskog pisca Fjodora Mihajloviča Dostojevskog izdan 1866. godine u časopisu Ruski vjesnik. Smatra se jednim od najvećih djela ruske književnosti.',
            'image_url' => 'http://www.logovita.ba/4263-thickbox_default/zlocin-i-kazna.jpg',
            'published_at' => Carbon::create('1961', '01', '01'),
            'author_id' => '11',
            'genre_id' => '3',
            'publisher_id' => '11',
            'total_copies' => '1'
        ]);
        Book::create([
            'name' => 'Starac i more',
            'description' => 'Oblikujući svoga junaka u duhu istrajnog aktivizma, Hemingvej (1898-1961) ga čini zapitanim nad smislom ljudske sudbine. Starčeva pozicija je utoliko zanimljivija što on stalno učestvuje u borbama koje prevazilaze njegovu snagu. „Ali ja ću joj pokazati šta čovek može, i šta je čovek u stanju da podnese, kaže starac čija borba u Hemingvejevom alegorijskom pripovedanju zadobija izgled ritualne predstave.',
            'image_url' => 'https://www.knjiga.ba/media/catalog/product/cache/1/image/160x/040ec09b1e35df139433887a97daa66f/slike/starac_i_more.jpg',
            'published_at' => Carbon::create('1971', '01', '01'),
            'author_id' => '12',
            'genre_id' => '3',
            'publisher_id' => '13',
            'total_copies' => '1'
        ]);
        Book::create([
            'name' => 'Zbogom oružje',
            'description' => 'Godine 1918. prošao je rat, rat koji će okončati sve ratove. Ernest Hemingway u njemu je sudjelovao kao dragovoljac službe hitne pomoći u Italiji, gdje je ranjen i dvaput odlikovan.',
            'image_url' => 'https://k6k6n6w8.rocketcdn.me/wp-content/uploads/2019/01/zbogom-oruzje.jpg',
            'published_at' => Carbon::create('1957', '01', '01'),
            'author_id' => '12',
            'genre_id' => '12',
            'publisher_id' => '14',
            'total_copies' => '2'
        ]);
        Book::create([
            'name' => 'Tisuću devetsto osamdeset četvrta',
            'description' => 'Tisuću devetsto osamdeset četvrta, naslov preveden i kao 1984., znanstvenofantastični roman koji je 1949. godine objavio britanski književnik George Orwell.',
            'image_url' => 'https://upload.wikimedia.org/wikipedia/hr/7/7e/Orwell1984hrv.jpg',
            'published_at' => Carbon::create('1983', '01', '01'),
            'author_id' => '13',
            'genre_id' => '9',
            'publisher_id' => '17',
            'total_copies' => '2'
        ]);
        Book::create([
            'name' => 'Životinjska farma',
            'description' => 'Životinjska farma je satirična novela ili bajka Georgea Orwella koja govori o grupi životinja koji su osvojili farmu za sebe i uživali do jednog perioda otkad je počeo teror i patnja. ',
            'image_url' => 'https://upload.wikimedia.org/wikipedia/hr/5/5d/%C5%BDivotinjska_farma.jpg',
            'published_at' => Carbon::create('1974', '01', '01'),
            'author_id' => '13',
            'genre_id' => '9',
            'publisher_id' => '17',
            'total_copies' => '2'
        ]);
        Book::create([
            'name' => 'Filozofija kompozicije',
            'description' => 'Prevedeno s engleskog jezika-"Filozofija kompozicije" esej je 1846. godine napisao američki pisac Edgar Allan Poe koji razjašnjava teoriju o tome kako dobri pisci pišu kad dobro pišu.',
            'image_url' => 'https://encrypted-tbn2.gstatic.com/images?q=tbn:ANd9GcQig_BFEtssJfqBGbrbgfm0WJmCB1DwlbcPQ5464FFs3_Iot38w',
            'published_at' => Carbon::create('1961', '01', '01'),
            'author_id' => '14',
            'genre_id' => '14',
            'publisher_id' => '17',
            'total_copies' => '2'
        ]);
        Book::create([
            'name' => 'Pustolovine Huckleberryja Finna',
            'description' => 'Pustolovine Huckleberryja Finna satirični je roman američkog književnika Marka Twaina, prvi puta u SAD-u izdan u veljači 1885. godine. ',
            'image_url' => 'https://shop.skolskaknjiga.hr/media/catalog/product/cache/1/image/9df78eab33525d08d6e5fb8d27136e95/0/6/060160_2.jpg',
            'published_at' => Carbon::create('2000', '01', '01'),
            'author_id' => '15',
            'genre_id' => '3',
            'publisher_id' => '12',
            'total_copies' => '2'
        ]);
        Book::create([
            'name' => 'Pustolovine Toma Sawyera',
            'description' => 'Pustolovine Toma Sawyera je roman kojeg je napisao Mark Twain. Roman je objavljen 1876., a pisan tri godine Ima i nastavak, no Tom Sawyer, urota nije završen. Glavni likovi su Tom Sawyer, Hucklebery Finn i Becky, a sporedni teta Polly, Crveni Joe, Sid, Mary...',
            'image_url' => 'http://www.logovita.ba/6833-thickbox_default/pustolovine-toma-sawyera.jpg',
            'published_at' => Carbon::create('1965', '01', '01'),
            'author_id' => '15',
            'genre_id' => '3',
            'publisher_id' => '14',
            'total_copies' => '2'
        ]);
        Book::create([
            'name' => 'Otac Goriot',
            'description' => 'Otac Goriot ili Čiča Goriot, realistički roman Honoréa de Balzaca, dio ciklusa romana Ljudska komedija. Smatra se Balzacovim najpoznatijim i najčitanijim romanom te najvećim pojedinačnim dostignućem unutar ciklusa Ljudske komedije. ',
            'image_url' => 'https://encrypted-tbn1.gstatic.com/images?q=tbn:ANd9GcSyaCyJNAPFG4Zyk8ELodR75cHJEwOThAe3BhZvtitHJwozkQj4',
            'published_at' => Carbon::create('1996', '01', '01'),
            'author_id' => '16',
            'genre_id' => '1',
            'publisher_id' => '18',
            'total_copies' => '2'
        ]);
        Book::create([
            'name' => 'Eugenie Grandet',
            'description' => 'Prevedeno s engleskog jezika-Eugénie Grandet roman je prvi put objavio 1833. godine francuski autor Honoré de Balzac. Dok je pisao, osmislio je svoj ambiciozni projekt "Ljudska komedija" i gotovo odmah pripremio drugo izdanje ...',
            'image_url' => 'https://www.knjiga.ba/media/catalog/product/cache/1/image/160x/040ec09b1e35df139433887a97daa66f/slike/eugenija_grande.jpg',
            'published_at' => Carbon::create('1939', '01', '01'),
            'author_id' => '16',
            'genre_id' => '3',
            'publisher_id' => '18',
            'total_copies' => '1'
        ]);
        Book::create([
            'name' => 'Odiseja',
            'description' => 'diseja jedan je od dva grčka epa koji se pripisuju pjesniku Homeru. Opisuje pustolovine grčkog junaka Odiseja. Aleksandrijski su filolozi podijelili „Odiseju” u 24 pjevanja prema broju slova u grčkom alfabetu.',
            'image_url' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/7/79/Odysseen_-_forside_af_1878-udgave.jpg/200px-Odysseen_-_forside_af_1878-udgave.jpg',
            'published_at' => Carbon::create('2007', '01', '01'),
            'author_id' => '17',
            'genre_id' => '3',
            'publisher_id' => '11',
            'total_copies' => '1'
        ]);
        Book::create([
            'name' => 'Ilijada',
            'description' => 'Ilijada jedan je od dva Homerova epa. U 6. st. pr. Kr. u Ateni za vrijeme Pizistrata dobila je današnji oblik. Pizistrat je ustanovio panatenski praznik za vrijeme kojeg su se recitirale Homerove pjesme. ',
            'image_url' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/c/c0/Homer_Ilias_Griphanius_c1572.jpg/200px-Homer_Ilias_Griphanius_c1572.jpg',
            'published_at' => Carbon::create('1965', '01', '01'),
            'author_id' => '17',
            'genre_id' => '3',
            'publisher_id' => '12',
            'total_copies' => '1'
        ]);
        Book::create([
            'name' => 'Preobrazba',
            'description' => 'Preobrazba je pripovijetka Franza Kafke, prvi put objavljena 1915., i svakako najslavnije njegovo djelo uz romane Proces i Dvorac.',
            'image_url' => 'https://mozaik-knjiga.hr/wp-content/uploads/2017/09/PROCES-215x300.png',
            'published_at' => Carbon::create('2012', '01', '01'),
            'author_id' => '18',
            'genre_id' => '2',
            'publisher_id' => '12',
            'total_copies' => '3'
        ]);
    }
}
