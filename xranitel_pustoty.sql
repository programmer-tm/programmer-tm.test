-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Дек 16 2021 г., 12:22
-- Версия сервера: 10.6.5-MariaDB
-- Версия PHP: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `xranitel_pustoty`
--

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `moder_id` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `comments`
--

INSERT INTO `comments` (`id`, `post_id`, `name`, `email`, `text`, `user_id`, `moder_id`, `status`) VALUES
(41, 26, 'fsfds', 'sfsfsd', 'sfsdf', NULL, NULL, 1),
(42, 26, 'sds', 'zdd', 'dd', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `posts`
--

CREATE TABLE `posts` (
  `id` int(255) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `reading` int(255) NOT NULL DEFAULT 0,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `posts`
--

INSERT INTO `posts` (`id`, `title`, `text`, `reading`, `image`) VALUES
(2, 'Ностальгия', 'Снова дорога, путь выбран не близкий.\r\nСкорости много, и старт очень низкий.\r\nКоль место забытое помнит душа.\r\nДойдем туда снова с тобой неспеша.\r\n\r\nПустынные улицы, солнце в зените,\r\nИдём, заведённые, как на магните.\r\nПусть капает с неба дождик шальной.\r\nМы с не покрытой идем головой.\r\n\r\nВ карманы положим мечтаний букет,\r\nСловно травинок невидимый цвет.\r\nГоды проходят, скрывая пути.\r\nТолько, ведь, можно ещё тут идти.\r\n\r\nНа ностальгию пробило поэта,\r\nВстретить зенит у болота привета.\r\nЛес расходись, отбегай и трава,\r\nБудет спокойна моя голова.', 21, NULL),
(3, 'Небесная канцелярия', 'В небесной канцелярии сегодня выходной,\r\nНе помнит, праздная душа, уроков от дорог.\r\nБолтается она по ним, так, словно, шабутной,\r\nИ, будем уж честны, порой, сомнителен итог.\r\n\r\nСражаться с демоном внутри, дано, увы, не всем.\r\nНо верх ему не стоит брать, отныне над тобой.\r\nИскать теперь не стоит нам в миру иных проблем.\r\nКоллекция таких даров поделена судьбой.\r\n\r\nНасыпал Бог даров суму, да Демон держит путь,\r\nНароду сильно не везёт, ломается маршрут.\r\nМы часто видим горизонт, но реже зрится суть,\r\nПройти сие дано не всем, не важно, как ты крут.\r\n\r\nОбрыв у нечести в руках, ползти тут не с руки,\r\nА Бог у нас лишь в головах, и не дано крыла.\r\nИ попросить народ не смел у вечности крюки,\r\nЧтобы доставить снова в рай творённые тела.', 0, NULL),
(4, 'Закрыть бы душу на замок...', 'Закрыть бы душу на замок\r\nДа потерять скорее ключ.\r\nЧужой забыть уж нам урок,\r\nНе видеть уходящих туч.\r\n\r\nОставлены следы судьбы,\r\nВ душе у каждого из нас.\r\nНе слышно будет и мольбы.\r\nКогда закончим сей мы сказ.\r\n\r\nПрисядь, читатель, осмотрись,\r\nНе принимай решенье сразу.\r\nЧуть слышно духам помолись,\r\nОни услышат сердца фразу.\r\n\r\nСпокойствие придет само,\r\nОтветы подберутся верно.\r\nНе думай, это не клеймо,\r\nТут Богом посланное зерно.', 0, NULL),
(5, 'Про поэта', 'Вот вылил строки на бумагу,\r\nВ душе немного стало проще.\r\nТак, словно орден За Отвагу,\r\nИ лица снова стали жёстче.\r\n\r\nПереберу моменты жизни,\r\nСтараясь завернуть стихами.\r\nПусть не поможет то отчизне,\r\nДа не проглотят с потрохами.\r\n\r\nВсю злобу завернуть разумно,\r\nПомять, потискать и осмыслить.\r\nНа мир смотреть, чтоб не безумно,\r\nИ только позитив отчислить.\r\n\r\nПоэт доволен, он прочитан,\r\nТворенье сделал не напрасно.\r\nИ, даже, если он отчитан,\r\nТворение его прекрасно.', 0, NULL),
(6, 'Тишина', 'Ах как, порою, хочется молчать,\r\nПоймать в охапку ветер над собою.\r\nИ, просто, никому не докучать,\r\nУпасть в траву, так, чтобы с головою.\r\n\r\nСбежать от суеты привычных трасс,\r\nЗабыть дорогу в суетливый город.\r\nНе видеть разномастных лживых глаз,\r\nИ не стараться завернуться в ворот.\r\n\r\nПодходы позабыть к подъездам душ,\r\nТем, что в ответ неистово кричали.\r\nБежать подальше, в радостную глуш,\r\nВедь мысли о покое так мечтали.\r\n\r\nТут не бегут, сгорая без остатка,\r\nНе пробуют разбить себя о стены.\r\nКакая б не была кирпичной кладка,\r\nНе будет уж она решать проблемы.', 0, NULL),
(7, 'Главное', 'Главное в жизни: дарить позитив,\r\nДаже пинок схлопотав от судьбы,\r\nИ, на поломанный нервами, гриф,\r\nМы не закинем пощады мольбы.\r\n\r\nЧиним сердца, усмиряем озера,\r\nВетер заставим умчаться тоскливо.\r\nДа не наступит кончало фольклёра,\r\nИ не ходить в тишине сиротливо.\r\n\r\nА как леща мы с тобою схлопочем,\r\nНе подставляя щеку силе жуткой.\r\nЗначит добра уже мало пророчим,\r\nИли же мир не доволен был шуткой.\r\n\r\nВраз уходя, заворачивать годы,\r\nСмело трезвонить во все бубенцы.\r\nЧтоб не тонули бы впредь пароходы,\r\nИ не пугали народ сорванцы.', 0, NULL),
(8, 'Эмоции', 'Собрать эмоции в кулак,\r\nИ взять гусиное перо.\r\nСмотреть в окно не на Гулаг,\r\nНо через тёмное стекло.\r\n\r\nПростить прохожего плевок,\r\nОтрыть окно, как дверь миров.\r\nОтвесить пришлому кивок,\r\nНе отвернувшись от даров.\r\n\r\nПридти в наш мир героем дня,\r\nХоть день не видеть целиком.\r\nЧтоб на краю сухого пня,\r\nГореть незримым мотыльком.\r\n\r\nЗабыть про день, запомнить ночь,\r\nИдти по жизни не сгибаясь.\r\nПомочь всем уходящим прочь,\r\nЛицом довольным ухмыляясь.', 0, NULL),
(9, 'Спамерам посвящается', 'Вот и здравствуйте, топтатели души.\r\nОскорблять и прогонять не стану Вас.\r\nНе привыкли, пусть, к осознанной тиши.\r\nЯ продолжу, непременно, сей рассказ.\r\n\r\nВы приходите тогда, когда не ждут,\r\nНе разувши ног проходите всегда.\r\nИ в стремлении порушить мой уют,\r\nВы суёте свои мысли не туда.\r\n\r\nНе спешите признавать ошибок воз,\r\nРазложить его пытаетесь на всех.\r\nНо не будет больше пролитых тут слёз.\r\nВстретит Вас лишь философский смех.\r\n\r\nИ отправитесь в колонне Вы одной,\r\nБарабан на шею вешать не спешу.\r\nПусть Вас примут сразу и толпой.\r\nТак в послании я Князю напишу.', 0, NULL),
(10, 'Нами правит...', 'Пусть нами правит пустота,\r\nПройдём мы посреди дорог.\r\nВокруг приличных - нагота,\r\nНе вспомнив вечного урок.\r\n\r\nДуша заключена во мрак,\r\nЗаклеен рот, закрыты уши.\r\nНадень хоть на такого фрак,\r\nИ не пускай, уж, дальше суши.\r\n\r\nНе будет дела до чудес,\r\nСвободы не почует нюх.\r\nВ таких вселился молча бес,\r\nВладеет телом злобный дух.\r\n\r\nНе будет дальше зреть душа,\r\nПокоя не познаешь телом.\r\nХоть явства дивные глуша,\r\nХоть занимаясь срамным делом.', 0, NULL),
(11, 'Позитив', 'А выставлять ли душу на показ?\r\nХороший задаю, подчас, вопрос.\r\nО чем на старте заводить рассказ,\r\nИ воротить ли, с не привычки, нос?\r\n\r\nИдти ли в низ или смотреть с горы?\r\nСуровость в жизни избирать не нам?\r\nНе поддаваться грусти до какой поры,\r\nКак выносить своей природы храм?\r\n\r\nПоступкам непонятным - меры нет.\r\nИдти, порой, приходится косясь.\r\nКаков бы не был на вопрос ответ,\r\nПройти свой путь положено смеясь.\r\n\r\nЯ принесу лишь молча позитив,\r\nЗабытый, под судьбы миров, окном.\r\nСниму, наверно, прошлый негатив,\r\nОкутав мир культурным очень сном.', 0, NULL),
(12, 'Призрачная гонка', 'Призрачная гонка: от себя к чужим,\r\nСнова, в мире этом, будешь молодым.\r\nПробежали зимы, пронеслись лета,\r\nВон уже маячит, всех границ, плита.\r\n\r\nДень закончен разом, на плечо сума,\r\nКак не жмурься глазом, этот мир - тюрьма.\r\nВ щёлочку посмотрит Бог одним глазком,\r\nДа не станет уж Отец стукать кулаком.\r\n\r\nПробегай, мой милый друг, через турникет,\r\nПозабудь сорвать, порой, огненный букет.\r\nДобрым словом помяни ты врагов своих,\r\nОпиши миров расцвет, даже для глухих.\r\n\r\nРадость жизни осознать можно один раз,\r\nТак попробуй написать неспеша рассказ.\r\nОстанавливать полёт душ дано не нам,\r\nОбойдемся без чудес и натужных драм.', 0, NULL),
(13, 'Играем роли...', 'А мы играем наши роли,\r\nЗабыты Бога очертанья.\r\nДавно утеряны пароли,\r\nОт золотого мирозданья.\r\n\r\nМы вырываемся из рамок,\r\nПрироды начертаний важных.\r\nМужик отыгрывает самок,\r\nНе задушевных, а продажных.\r\n\r\nОткрыть судебную страницу,\r\nЗайти обратно в своё тело.\r\nУбрать гребущую десницу,\r\nНе гоже дьявольское дело.\r\n\r\nСбежать боимся от расплаты,\r\nЗабыть придуманные роли.\r\nПокинуть адские палаты,\r\nСтереть, чужих людей, \"пароли\".', 0, NULL),
(14, 'Боимся вырваться из роли...', 'Боимся вырваться из роли,\r\nИ убежать в мир без оглядки.\r\nСтереть, других людей, пароли,\r\nИ не играть с судьбою в прятки.\r\n\r\nБоимся показаться грязным,\r\nБоимся праведного взора.\r\nБоимся быть весьма заразным,\r\nНо не боимся судеб вора.\r\n\r\nПриходит в мир неторопливо,\r\nСебя скрывает он искусно.\r\nАнализирует строптиво,\r\nДа и вздыхает очень грустно.\r\n\r\nВорует образ он умело,\r\nТы, даже, не заметишь толком,\r\nТак ловко знает это дело,\r\nЧто не посмотрит в душу волком.', 0, NULL),
(15, 'Этим миром...', 'Этим миром подарено множество лиц,\r\nПроживаешь, порою, десятки ролей.\r\nНе получится, только за жизнь, падать ниц,\r\nРоли нищих гонцов даже для королей.\r\n\r\nИзменять своей жизни не пробуй, дружок.\r\nОтрекаться от лиц не дано пред судьбой.\r\nСтанови свои сущности просто в кружок,\r\nДа идите вперед как один, но толпой.\r\n\r\nМного в жизни даровано разных путей,\r\nНепонятных дорог, зачарованных птиц.\r\nУ судьбы слишком много железных сетей,\r\nДля любого из прочих сияющих лиц.\r\n\r\nПозабудутся маски, сотрутся обиды,\r\nПерекинут другим не доигранность роли.\r\nОтдавай без остатка, чужие флюиды,\r\nПусть закончатся в мире ошибки и боли.', 0, NULL),
(16, 'Реальность', 'Куда ушла от нас реальность?\r\nСверкая пятками тоскливо.\r\nИ, погружаясь в виртуальность,\r\nСменяем ночь мы торопливо.\r\n\r\nБежим к нолям и единицам,\r\nПокорно отдаваясь току.\r\nБоясь отправиться к границам,\r\nСтремясь к компьютера уроку.\r\n\r\nМы превращаемся в рисунки,\r\nЗабудем снова радость жизни.\r\nЗабьем голы в чужие лунки,\r\nНо не поможем тем отчизне.\r\n\r\nСменяя ночью день постыдный,\r\nМы вылезаем ошалело,\r\nНо будет он не слишком рыбный,\r\nХоть и плутали там умело...', 0, NULL),
(17, 'Посыльный', 'Незримый посыльный меж раем и адом.\r\nОбводит наш мир он таинственным взглядом.\r\nХранится баланс в назеданее многим.\r\nБогатым иль бедным, здоровым, убогим.\r\n\r\nОн глазом следит за течением планеты,\r\nНе просит тебя и стрельнуть сигареты.\r\nПройдет мимоходом аварии, шторм.\r\nНе станет использовать брошенный корм.\r\n\r\nОтправит послание Бога пророку,\r\nОбучит засранца и Князя уроку.\r\nВезде успевает, за всем приглядит.\r\nДля храброго он дополнительный щит.\r\n\r\nПоможет советом, направит по жизни.\r\nДостойно отправит на помощь отчизне.\r\nТрудна та работа, оплаты не видно.\r\nНо он же посыльный, ему не обидно.', 0, NULL),
(18, 'Оставь, миров своих, обитель...', 'Оставь, миров своих, обитель.\r\nЗабудь в парадной у дверей.\r\nМирских потуг добротный китель.\r\nИ гавань мёртвых кораблей.\r\n\r\nПрости пропавшие вновь стены.\r\nПрироде дай забрать своё.\r\nКорням пустить тугие вены.\r\nОбрушить место в забытьё.\r\n\r\nПройди путей далёких тропы.\r\nЗабудь про деньги и заказы.\r\nОставь ненужные, вдруг, копы.\r\nХрани наставников рассказы.\r\n\r\nУйди от мира мимоходом.\r\nПодняться ввысь не торопись.\r\nХорона крепким пароходом.\r\nПо речке мёртвых проберись.', 0, NULL),
(19, 'Оставь обиды...', 'Оставь обиды за этим порогом,\r\nНе стоить плакать перед Богом.\r\nНе будет помощи в злом деле,\r\nЗдоровья не оставит в теле.\r\n\r\nДарить добро пора народу\r\nНе по простому бутерброду.\r\nИзмерить силу направлений,\r\nУзнать цену часов делений.\r\n\r\nСобрать пожитки в рюкзачок,\r\nЗажать бы компас в кулачок.\r\nПокинуть мир сплошных невзгод,\r\nИ позабыть к подъезду код.\r\n\r\nПод крышей спрятаться из трав.\r\nСкрывая от людей свой нрав.\r\nПисать строку к строке строкой.\r\nПускай немой но всё ж рукой.', 0, NULL),
(20, 'Черновик...', 'Оставь за порогом обиду и злобу.\r\nСнимая, нечаянно, мир наш на пробу.\r\nОтправься в поход, покорми комаров.\r\nОставь недосказанным парочку слов.\r\n\r\nТы мысль отпусти, не удерживай силой.\r\nНе будет невольница сразу вдруг милой.\r\nПро тело тут скажут - не верим тебе.\r\nИ пусть, не дано угодить голытьбе.\r\n\r\nЗайди просто с тыла, открой им глаза.\r\nНе каждому в мире нужна стрекоза.\r\nНа душу не смотрит, ведь, каждый второй.\r\nТак есть ли же смысл в то нырять с головой?', 0, NULL),
(21, 'Черновик души', 'Вот и черновик души,\r\nОставлен перед Богом.\r\nЯ замер в огненной тиши,\r\nНебесным пред порогом.\r\n\r\nОткрыто все, что говорил,\r\nЧто думал - выложил ему.\r\nВсё то, что Вам не подарил,\r\nМне это больше не к чему.\r\n\r\nОтвет держать придётся всем,\r\nИ ты не думай, не отступит.\r\nНе важен ход мирских проблем,\r\nИ что теперь твой прах не купит.\r\n\r\nЗабудь потребности злых тел,\r\nВажней спокойствие души.\r\nНе будет завершённых дел,\r\nВ миру закравшейся тиши.', 0, NULL),
(22, 'Обращение', 'Читатель, будь уже собой,\r\nЗабудь пороки, неудачи.\r\nБеги один, а не с толпой,\r\nСовсем не требуя отдачи.\r\n\r\nЗабрось уж мира суету,\r\nЗакинь в суму свои печали.\r\nНе бойся видеть наготу,\r\nХрани заветные скрижали.\r\n\r\nДорогу проложи во мгле\r\nДуши не угасавшим светом.\r\nНе стоит отдавать игле\r\nПобед, пришедших с этикетом.\r\n\r\nТут телом не измерят путь,\r\nЛишь разум властвует всецело.\r\nНайди дороги лучше суть\r\nИ раскрывай себя тут смело.', 0, NULL),
(23, 'Размышления...', 'Знаешь, не в том переклинило месте.\r\nГоды проходят, не справиться с тьмой.\r\nМы так живём, но не хуже, чем в Бресте,\r\nНе разбираясь с людской кутерьмой.\r\n\r\nМир открываем, стираем границы,\r\nСтрого проходим отбор боевой.\r\nНо не погнули ещё мы все спицы,\r\nЗначит, старателен наш рулевой.\r\n\r\nСтранен размер, да и рифм не богато.\r\nВылита мысль в электронный дневник.\r\nМожет, и будем тут жить не когда-то,\r\nДоколе, питает России родник.\r\n\r\nСтоит нам помнить истоки родни,\r\nГоды пусть мчаться, ломая дороги.\r\nНе пропускаем и мы беготни,\r\nЧасто оббив не любимых пороги.', 0, NULL),
(24, 'Покинуть...', 'Покинуть снова интернет,\r\nУйти рывком в реальный мир.\r\nОставить дома бы планшет\r\nИ прекратить у троллей пир.\r\n\r\nУсадим тело на диван,\r\nДа хоть на жесткий табурет.\r\nЗабудем прочий мы обман.\r\nГотовя жизни трафарет.\r\n\r\nНе счесть постигнутых миров,\r\nКуда и гугл не водит нас.\r\nЖаль, не скопили там даров,\r\nИ как украсить сей рассказ?\r\n\r\nЯ понял, напишу привет,\r\nНачало всех типичных фраз.\r\nИ да, не требую ответ,\r\nНо жду задумчивых я глаз.', 0, NULL),
(25, 'Ностальгия', 'Снова дорога, путь выбран не близкий.\r\nСкорости много, и старт очень низкий.\r\nКоль место забытое помнит душа.\r\nДойдем туда снова с тобой неспеша.\r\n\r\nПустынные улицы, солнце в зените,\r\nИдём, заведённые, как на магните.\r\nПусть капает с неба дождик шальной.\r\nМы с не покрытой идем головой.\r\n\r\nВ карманы положим мечтаний букет,\r\nСловно травинок невидимый цвет.\r\nГоды проходят, скрывая пути.\r\nТолько, ведь, можно ещё тут идти.\r\n\r\nНа ностальгию пробило поэта,\r\nВстретить зенит у болота привета.\r\nЛес расходись, отбегай и трава,\r\nБудет спокойна моя голова.', 6, NULL),
(26, 'Без названия', 'Не стоит этот мир случайных слез,\r\nНе стоит поддаваться на интриги.\r\nНе стоит суета практичных грез,\r\nНе стоит поджигать чужие книги.\r\n\r\nНам стоит приглядеться к пустоте,\r\nНам стоит доверять толпе не сильно.\r\nНам стоит доверяться чистоте,\r\nНам стоит не питать тела обильно.\r\n\r\nДолжно быть, то рассказано давно,\r\nДолжно быть, не для каждого такое.\r\nДолжно быть, жизнь - суровое кино,\r\nДолжно быть, не затронуто плохое.\r\n\r\nПусть будет, жизнь - дорога к небесам,\r\nПусть будет, мир добрее с каждым разом.\r\nПусть будет можно, делать выбор нам,\r\nПусть будет невозможно дергать глазом.', 9, NULL),
(27, 'тестовый пост', 'новый пост1', 25, 'admin.gif');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(255) NOT NULL,
  `nickname` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `surname` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 2,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(4) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `nickname`, `name`, `surname`, `email`, `avatar`, `status`, `password`, `token`) VALUES
(1, 'Programmer-tm', 'Сергей', 'Минеев', 'Programmer-tm@mail.ru', 'admin.gif', 0, '$2y$10$PX2tBgsc6QSRdYNxxiLvXOvmnGVejcNu4U/uehkpgbOjZXOy9DhVu', ''),
(2, 'user', 'user', 'test', 'gdsgdsds', 'cat.png', 0, '$2y$10$m9x1APh8uxCxF70SRk1TKunT/h0JozbiePS.PzxmCjiOe8nGE9Wbi', '');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nickname` (`nickname`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT для таблицы `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
