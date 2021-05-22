DROP TABLE IF EXISTS products;
DROP TABLE IF EXISTS categories;

CREATE TABLE categories (
    categoryID INTEGER AUTO_INCREMENT,
    categoryName VARCHAR(40) NOT NULL,
    CONSTRAINT pk_categories PRIMARY KEY (categoryID)
);

CREATE TABLE products (
    productID INTEGER AUTO_INCREMENT,
    productName VARCHAR(40) NOT NULL,
    categoryID INTEGER,
    productOrigin VARCHAR(40) NOT NULL,
    productPrice FLOAT NOT NULL,
    productVolume INTEGER NOT NULL,
    productAlcoholLevel INTEGER NOT NULL,
    productDescription VARCHAR(500) NOT NULL,
    productImageName VARCHAR(15) NOT NULL,
    CONSTRAINT pk_products PRIMARY KEY (productID),
    CONSTRAINT fk_categories FOREIGN KEY (categoryID) REFERENCES categories(categoryID),
    FULLTEXT (productName, productDescription)
) ENGINE=MyISAM;

INSERT INTO categories(categoryName) VALUES ('Whisky');
INSERT INTO categories(categoryName) VALUES ('Cognac');
INSERT INTO categories(categoryName) VALUES ('Rhum');
INSERT INTO categories(categoryName) VALUES ('Gin');
INSERT INTO categories(categoryName) VALUES ('Vodka');

INSERT INTO products(productName, categoryID, productOrigin, productPrice, productVolume, productAlcoholLevel, productDescription, productImageName) VALUES (
    'whisky mac namara',
    1,
    'écosse',
    28,
    70,
    40,
    'Le Mac Namara est un whisky provenant de la région des Gaéliques, au nord ouest de l''Ecosse, région riche en tradition où la culture et la tradition Celte est toujours très présente. Mac Namara, Le fils de la mer en Gaélique est un blend agé de 5 à 7 ans. C''est un whisky très typé par sa forte proportion de malt, au gout iodé prononcé et au nez légèrement tourbé. Un whisky sec et viril avant tout',
    'w001'
);

INSERT INTO products(productName, categoryID, productOrigin, productPrice, productVolume, productAlcoholLevel, productDescription, productImageName) VALUES (
    'whisky johnnie walker',
    1,
    'écosse',
    49,
    70,
    43,
    'Johnnie Walker est indiscutablement l''un des noms les plus connus au monde pour ses whiskys. On découvre ici l''un de ses produits icônes, le Green Label (label vert) 15 ans d''âge. Il est issu d''un assemblage minutieusement pensé de 12 single malts. Ce whisky exprime caractère, finesse et puissance, caractéristiques issues des terroirs d''exception et du savoir-faire unique de cette maison.',
    'w002'
);

INSERT INTO products(productName, categoryID, productOrigin, productPrice, productVolume, productAlcoholLevel, productDescription, productImageName) VALUES (
    'whisky isle of jura',
    1,
    'écosse',
    56,
    70,
    40,
    'Isle Of Jura, probablement la plus ancienne distillerie d’écosse, la plus isolée ; un havre de paix dont les premières traces de distillation remonteraient au XVI siècle ! Avec une robe de couleur ambrée aux reflets vieil or, il dévoile un nez très expressif et gourmand. Il s’affirme avec des arômes de Sherry et des notes de raisins blancs. La bouche est à la fois fruitée et épicée. On ressent la présence des céréales avec des touches boisées et tourbées. Avec une robe de couleur ambrée aux reflets vieil or, il dévoile un nez très expressif et gourmand. Il s’affirme avec des arômes de Sherry et des notes de raisins blancs. Il tend par la suite vers des notes fruitées de poire et d’abricot avec du caramel et de la cannelle. La bouche est d’une grande douceur. A la fois fruitée et épicée on ressent parfaitement la présence des céréales avec des touches boisées et tourbées.',
    'w003'
);

INSERT INTO products(productName, categoryID, productOrigin, productPrice, productVolume, productAlcoholLevel, productDescription, productImageName) VALUES (
    'whisky distillerie white oak',
    1,
    'japon',
    37,
    50,
    40,
    'La distillerie conçoit ces whiskies de la manière la plus traditionnelle qui soit notamment avec une grande partie de la production réalisée à la main par des artisans locaux. Le whisky Tokinoka en est l’exemple même. Tokinoka est inspiré par les techniques écossaises… Du brassage, à la distillation, jusqu’à à la maturation en fût de chêne. Elaboré à partir d’eaux souterraines extrêmement pures, le résultat est moelleux et onctueux. Il vous fait ainsi découvrir un bel équilibre de notes épicées tout en conservant la douceur de la vanille, caractéristique chez Tokinoka. De plus, le climat du Japon apporte lui aussi une touche particulière aux whiskies, puisque les grands écarts de température enregistrés entre la saison estivale et hivernale favorisent le processus de vieillissement.',
    'w004'
);

INSERT INTO products(productName, categoryID, productOrigin, productPrice, productVolume, productAlcoholLevel, productDescription, productImageName) VALUES (
    'cognac léopold groumel',
    2,
    'france',
    110,
    70,
    40,
    'Sa dégustation révèle des arômes vanillés et de fleurs telles que la rose, le jasmin et le lys. Sans la moindre agressivité, la bouche est soyeuse, complexe avec une finale de chèvrefeuille et de tilleul. Le cognac préféré du maître de chai du Domaine!',
    'c002'
);

INSERT INTO products(productName, categoryID, productOrigin, productPrice, productVolume, productAlcoholLevel, productDescription, productImageName) VALUES (
    'cognac hine',
    2,
    'france',
    345,
    70,
    42,
    'Ce millésime rond et équilibré a développé sa richesse grâce au taux d’humidité élevé de l’air des chais de Bristol où il a longuement vieilli. Au nez, des notes de figue, de fruit confit, de gingembre et de miel s’achèvent en bouche sur une infinie douceur. Au fil des siècles, la Maison HINE a élaboré une collection impressionnante de millésimes de Grande Champagne datant des plus belles années du siècle dernier, ce flacon en résulte.',
    'c002'
);

INSERT INTO products(productName, categoryID, productOrigin, productPrice, productVolume, productAlcoholLevel, productDescription, productImageName) VALUES (
    'rhum plantation',
    3,
    'barbades',
    35,
    70,
    40,
    'Issu de l''assemblage de différents rhums de la Barbade vieillis en fûts de bourbon dans les Caraïbes, puis affinés dans de vieux fûts de chêne français au château de Bonbonnet. Son nez gourmand, typique du style de la Barbade, révèle des notes de coco grillé, de fudge et de vanille boisée. Plantation Grande Réserve peut se déguster seul ou en cocktail. A l’instar des rums de la Jamaïque et de Guyana, ce rum, produit à la Barbade, est une expression fidèle à la tradition de production de rums britanniques. Puissants, riches et concentrés, ils sont issus d’une fermentation longue, distillés souvent dans des alambics traditionnels en cuivre et élevés en fûts de chêne.',
    'r001'
);

INSERT INTO products(productName, categoryID, productOrigin, productPrice, productVolume, productAlcoholLevel, productDescription, productImageName) VALUES (
    'rhum clément',
    3,
    'france',
    39,
    70,
    50,
    'Ce rhum blanc monovariétal a su s’imposer depuis sa création en 2001 comme l’un des meilleurs rhums blancs produits. Chaque année son lancement attendu permet d’avoir une idée de la qualité intrinsèque du millésime. À boire bien entendu en Ti’Punch. À déguster frais avec un Panetela de chez Por Larranaga.',
    'r002'
);

INSERT INTO products(productName, categoryID, productOrigin, productPrice, productVolume, productAlcoholLevel, productDescription, productImageName) VALUES (
    'gin roku',
    4,
    'japon',
    37,
    70,
    43,
    'Premier gin élaboré par Suntory, Roku Gin a été infusé avec une sélection de plantes, représentant les quatre saisons : les feuilles de sakura, et la fleur de sakura pour le printemps, le thé sencha et le thé gyokuro pour l''été, le poivre sansho pour l''automne et le zeste de yuzu pour l''hiver. On trouvera également, les ingrédients traditionnels du gin, dont le geniévre, l''écorce d''orange, le zeste de citron, la coriandre et la cannelle, entre autres. Le résulat est très réussi et son prix reste abordable. Le flacon est particulièrement soigné et fera un cadeau des plus appréciés. Une valeur sûre.',
    'g001'
);

INSERT INTO products(productName, categoryID, productOrigin, productPrice, productVolume, productAlcoholLevel, productDescription, productImageName) VALUES (
    'gin mare',
    4,
    'espagne',
    58,
    70,
    42,
    'Premier gin élaboré par Suntory, Roku Gin a été infusé avec une sélection de plantes, représentant les quatre saisons : les feuilles de sakura, et la fleur de sakura pour le printemps, le thé sencha et le thé gyokuro pour l''été, le poivre sansho pour l''automne et le zeste de yuzu pour l''hiver. On trouvera également, les ingrédients traditionnels du gin, dont le geniévre, l''écorce d''orange, le zeste de citron, la coriandre et la cannelle, entre autres. Le résulat est très réussi et son prix reste abordable. Le flacon est particulièrement soigné et fera un cadeau des plus appréciés. Une valeur sûre.',
    'g002'
);

INSERT INTO products(productName, categoryID, productOrigin, productPrice, productVolume, productAlcoholLevel, productDescription, productImageName) VALUES (
    'vodka belvedere smogory',
    5,
    'pologne',
    49,
    70,
    40,
    'Une vodka polonaise haut de gamme et non filtrée, produite avec une distillation de grain de seigle « Diamant Dankowskie » des forêts de Smogóry. Le secret du charme des vodkas Belvedere vient de la qualité premium de ses ingrédients comme le seigle, l''eau et une distillation de précision. Cette bouteille au design unique et moderne à l''effigie du palais présidentiel de Pologne sera le cadeau idéal pour les amateurs de produits raffinés.',
    'v001'
);

INSERT INTO products(productName, categoryID, productOrigin, productPrice, productVolume, productAlcoholLevel, productDescription, productImageName) VALUES (
    'nikka coffey vodka',
    5,
    'japon',
    40,
    70,
    40,
    'Élaborée dans un alambic Coffey, cette vodka est le fruit de l’assemblage d’un distillat de maïs et d’un distillat d’orge maltée. Au moment de la mise en bouteille, elle a été filtrée sur du charbon de bois de bouleau afin de conserver un maximum d’onctuosité et d’équilibre. À la fois suave et riche, le premier nez est marqué par des notes de noix de cajou, de réglisse, de menthe et de framboise. À l’aération, il évolue avec distinction sur l’herbe fraîchement coupée, l’amande et les agrumes (citron). Puis, de la coriandre, du lait de coco et des litchis arrivent en point d’orgue. Plutôt vive, l’attaque en bouche revient sur les fruits secs (datte, amande) tandis que quelques épices très douces lui procurent beaucoup de dynamisme (cannelle, cardamome). Très herbacée, la finale évoque également une poire très mûre. En arrière-bouche, la suavité du maïs et le caractère granuleux de l’orge maltée sont parfaitement retranscrits.',
    'v002'
);
