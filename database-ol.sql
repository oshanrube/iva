-- MySQL dump 10.13  Distrib 5.5.18, for Linux (x86_64)
--
-- Host: localhost    Database: symfony
-- ------------------------------------------------------
-- Server version	5.5.18

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `Article`
--

DROP TABLE IF EXISTS `Article`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `content` longtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Article`
--

LOCK TABLES `Article` WRITE;
/*!40000 ALTER TABLE `Article` DISABLE KEYS */;
INSERT INTO `Article` VALUES (1,'features','<ul>\r\n<li>aaaa</li>\r\n</ul>'),(2,'about','asdasd'),(3,'support','test'),(4,'contact-us','test');
/*!40000 ALTER TABLE `Article` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Calendar`
--

DROP TABLE IF EXISTS `Calendar`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Calendar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  `description` longtext NOT NULL,
  `ownerId` int(11) NOT NULL,
  `privacyType` varchar(7) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Calendar`
--

LOCK TABLES `Calendar` WRITE;
/*!40000 ALTER TABLE `Calendar` DISABLE KEYS */;
INSERT INTO `Calendar` VALUES (0,'default',0,'',0,'private'),(26,'Birthdays',1,'my bdaysaa',1,'private'),(30,'Uni Life',1,'hahahah',1,'private'),(31,'Family Events',1,'aaa',1,'private'),(32,'School',1,'aaa',1,'private'),(33,'Office',1,'asdsad',1,'private'),(34,'Bikers events',0,'asd',1,'private'),(38,'Facebook-events',1,'Events synced from facebook',1,'private'),(39,'Facebook-Birthdays',1,'Birthdays synced from facebook',1,'private');
/*!40000 ALTER TABLE `Calendar` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `CalendarShare`
--

DROP TABLE IF EXISTS `CalendarShare`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `CalendarShare` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `calendarId` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `CalendarShare`
--

LOCK TABLES `CalendarShare` WRITE;
/*!40000 ALTER TABLE `CalendarShare` DISABLE KEYS */;
INSERT INTO `CalendarShare` VALUES (1,26,'oshan','aaaa'),(2,26,'oshan','asdasd'),(3,26,'oshan','aaa');
/*!40000 ALTER TABLE `CalendarShare` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Menu`
--

DROP TABLE IF EXISTS `Menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `label` varchar(255) NOT NULL,
  `parent` int(11) NOT NULL,
  `description` longtext NOT NULL,
  `type` int(11) NOT NULL,
  `url` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Menu`
--

LOCK TABLES `Menu` WRITE;
/*!40000 ALTER TABLE `Menu` DISABLE KEYS */;
INSERT INTO `Menu` VALUES (1,'Home',0,'member home page',2,''),(2,'',0,'',0,'');
/*!40000 ALTER TABLE `Menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `MenuType`
--

DROP TABLE IF EXISTS `MenuType`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `MenuType` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `MenuType`
--

LOCK TABLES `MenuType` WRITE;
/*!40000 ALTER TABLE `MenuType` DISABLE KEYS */;
INSERT INTO `MenuType` VALUES (1,'guest_top'),(2,'member_main');
/*!40000 ALTER TABLE `MenuType` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `News`
--

DROP TABLE IF EXISTS `News`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `News` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `datetime` int(11) NOT NULL,
  `location` varchar(255) CHARACTER SET latin1 NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=180 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `News`
--

LOCK TABLES `News` WRITE;
/*!40000 ALTER TABLE `News` DISABLE KEYS */;
INSERT INTO `News` VALUES (1,1328254471,'Colombo','Tamil group to protest in Toongabbie tomorrow','A Tamil group is planning to protest a visit by the Sri Lankas High Commissioner to Australia former admiral Thisara Samarasinghe. The High Commissioner will be visiting the Christian Congregation Australia Church tomorrow, Saturday, February 4, Australian media reports. MORE...'),(2,1328253427,'Colombo','Court summons Media Minister, Army Chief, IGP ','The Court of Appeal today granted approval to hold hearings on the petition filed by the relatives of missing activists, Lalith Kumar Weeraraj and Kugan Muruganathan, requesting that they be produced before the court. MORE..'),(3,1328250395,'Colombo','Sri Lanka backs nomination of Shavendra Silva to UN','Sri Lankas envoy to Australia says it fully supports the nomination of a military officer to a UN body advising Ban Ki-moon.  Admiral Thisara Samarasinghe says Major General Shavendra Silva is a man of outstanding calibre and an appropriate choice for the UN Advisory Group on Peacekeeping Operations. MORE...'),(4,1328248896,'Colombo','Deceiving workers will lead to further strikes: railway unions ','All Ceylon Railway General Employees Union warns that the government will have to face more strike actions in the future if it continues to deceive railway workers. MORE..'),(5,1328245095,'Colombo','Investigations commence into abduction of UC chairmans brother ','(VIDEO) Police said today that investigations have commenced into the alleged abduction of the brother of the Kolonnawa Urban Council Chairman. Police spokesman SP Ajith Rohana states that so far no clear information has been received regarding the incident. MORE..'),(6,1328236192,'Colombo','UN must act at next Human Rights Council session - HRW','The United Nations Human Rights Council should address the lack of accountability for wartime abuses in Sri Lanka during its March 2012 session, Human Rights Watch said in a letter to Human Rights Council (HRC) member countries and observers today. MORE...'),(7,1328232997,'Colombo','First death on Southern Expressway','A 26 year old youth has died in the first fatal accident on the Southern Expressway this morning. According to police the victims car had skidded off the road near the 21st post near Kalutara.'),(8,1328198184,'Colombo','Sri Lanka bourse slips ahead of policy rates, IMF','Sri Lankas share market fell more than 1 percent on Thursday, erasing 28 billion rupees ($245.83 million) of value, a day ahead of the central banks monetary policy announcement and expected International Monetary Fund comments on the economy. MORE..'),(9,1328183050,'Colombo','SL to bid for 2017 Asian Youth Games','Sri Lanka will bid to host the 2017 Asian Youth Games while the President has directed the Chairman of the National Olympic Committee to prepare for the bid. No other country has yet to bid for the games while Sri Lanka may win the bid uncontested. '),(10,1328182694,'Colombo','Former Ananda College Principal cleared of corruption charges','The Colombo Magistrate today (February 2) ordered that all corruption charges against former Ananda College Principal B.A. Abeyratne be dropped immediately. MORE..'),(11,1328179252,'Colombo','North and East to get Tamil speaking accountants','On proposal made by the President Mahinda Rajapaksa, as the Minister of Finance and Planning, the Cabinet has decided to conduct a special competitive examination to recruit Tamil Speaking officers for 63 vacancies of Grade III posts in the Sri Lanka Accountants Service in the Northern and Eastern Provinces. MORE...'),(12,1328175076,'Colombo','VIDEO: Kolonnawa UC Chairmans brother abducted in white van','The Kolonnawa Urban Council Chairmans brother was abducted a short while ago by an unidentified group traveling in a white van near the Meethotamulla garbage dump, Police Spokesman SP Ajith Rohana stated.'),(13,1328174325,'Colombo','Cabinet amends Act to impose spot fines for seat belt law violations','The Cabinet has decided to amend the Motor and Traffic Act to impose spot fines on violators of the seat belt regulation, the Government Information Department said a short while ago. MORE...'),(14,1328171776,'Colombo','No ban on selling Lankan goods in Tamil Nadu','Chief Incumbent of the Chennai Maha Bodhi Society, Ven  Thiniyawala Palitha Thero stated that newspaper articles in Sri Lanka claiming that Tamil Nadu Chief Minister J. Jayalalithaa had banned the sale of Sri Lankan goods in Tamil Nadu were false. MORE..'),(15,1328170438,'Colombo','Focus on plight of Palk Bay fishermen','A 15-member research team, comprising professors, lecturers and doctorate holders from Sri Lanka, South Africa, the Netherlands and India, is conducting research on the problems faced by fishermen in Palk Bay. MORE...'),(16,1328168099,'Colombo','School in Galigamuwa closed due to bee attack','The Yattegoda Yatahalatissa Prep School in Galigamuwa was closed due to a bee attack while four students were admitted to the Kegalle Teaching Hospital following the attack. MORE..'),(17,1328164469,'Colombo','1900 vehicles breakdown on E1; Authorities mull roadworthiness certificates','Due to a large number of vehicles breaking down on the Southern expressway authorities are contemplating implementing a roadworthiness certificates to use the road, an official said. Sri Lankas first expressway, the E1 was declared open on November 27, 2011. MORE...'),(18,1328162085,'Colombo','Court issues enjoining order preventing CMC general meeting','The court issued an enjoining order preventing the Colombo Municipal Council (CMC) from holding a special general meeting called for tomorrow (February 3), 2012.'),(19,1328159124,'Colombo','Hospitals to be given medicine and equipment to treat bird flu','The medicine and necessary medical equipment needed to treat bird flu will be supplied to hospitals in Chilaw and Bingiriya, the Health Ministry stated while adding that the treatment will be a necessary precaution if any patients display symptoms similar to bird flu. MORE..'),(20,1328155868,'Colombo','Non-bailable warrants on 3 suspects of Lankan team attack','A division bench of the Lahore High Court on Wednesday once again issued non-bailable arrest warrants for three accused of the attack on Sri Lanka cricket team in March 2009 and directed the police to produce them before the court till February 27. MORE..'),(21,1328155868,'Colombo','Anchor recognizes Young Achievers across the island','Anchor, Fonterras flagship brand, recently launched a quest to find Achievers across the island through the Anchor Achievers Challenge. The challenge explores various aspects of childrens mental and physical abilities, with the aim of inspiring children to be the best they can be and celebrate the achiever in each and every child......'),(22,1328155868,'Colombo','Another first for Sayerlack Wood Solutions','Sayerlack founded in 1954, the innovative Italian wood solutions product available in Sri Lanka through JAT Holdings, has become the first brand in the world to obtain the CATAS  WKI Premium Plus Certificate......'),(23,1328155868,'Colombo','ASUS Blu-ray Combo turns 3D Fantasy to Reality','ASUS BC-12B1LT is a powerful and energy-saving Blu-ray Disc drive capable of reading from 12X BD format and writing to 16X DVD±R format, is now available in Sri Lanka. With OTS strategy, it assures the best burning quality......'),(24,1328155868,'Colombo','MARKSS HEALTHCARE conducts workshop to educate OSUSALA pharmacists on ethical dispensing if steroids','MARKSS  HEALTHCARE, a fast growing pharmaceuticals company in Sri Lanka successfully conducted another session of a series of workshops to educate pharmacists of Osusala on the responsibilities in dispensing steroids......'),(25,1328155868,'Colombo','Janashakthi launches yet another novel policy - Livestock Insurance','Janashakthi Insurance launches yet another revolutionary policy with the launch of Janashakthi Livestock Insurance Policy.....'),(26,1328155868,'Colombo','Intel helps youth build brighter, better future through better education','Intel Sri Lanka together with the Ministry of Education signed an Addendum for the donation of an additional 100 Classmate PCs to the World Ahead Program. This Addendum is a continuation of the Memorandum of Understanding signed in 2008 for the donation of 500 PCs to be set up across the country.....'),(27,1328155868,'Colombo','Mercy Malaysia hands over hospital in Sri Lanka','Mercy Malaysia today handed over to the local authorities in Sri Lanka a divisional hospital which will provide health care services to the people in Jaffna. MORE..'),(28,1328155868,'Colombo','Ramsey goal dents Uniteds title charge','An Aaron Ramsey goal was enough to see Arsenal take all three points against Manchester United at the Emirates Stadium a short while ago. The loss severely dampens Uniteds record 19th title bid as they face second placed Chelsea at Old Trafford next week with a slender three point lead. MORE..'),(29,1328155868,'Colombo','Murali forgives Hair but Howards jibe still offends','Melbourne, Oct 20 (PTI): He has forgiven and forgotten former umpire Darrell Hair but Sri Lankan spin wizard Muttiah Muralitharan says the chucker jibe that came from Australias ex-Prime Minister John Howard still rankles him. READ MORE....'),(30,1328155868,'Colombo','Cricketing legend CI passes away','Sri Lankas legendary batsman C. I. Gunasekera, who turned 90 this month passed away today. Conroy Ievers Gunasekara (born July 14, 1920) was a Sri Lankan first-class cricketer prior to his country being granted Test status. MORE...'),(31,1328155868,'Colombo','Ashanti bags top awards at IndieGo Music Awards','Ashanti de Alvis wins Best Female Singer (Gold), Most Creative Act and Best Pop Act of Asia (Silver) at Indigo Music Awards, South Asias 1st Music awards. MORE..'),(32,1328155868,'Colombo','Oscar nominations revealed','Nominations for the 84th annual Academy Awards were announced this morning. Mystique herself -- Jennifer Lawrence, who was nominated last year for best actress -- made the announcement with Academy president Tom Sherak. MORE..'),(33,1328155868,'Colombo','Sri Lankan-American singer Bhi Bhiman displays mordant humor in Bhiman','As with a singer like Antony Hegarty (of Antony and the Johnsons) or Iris Dement, what strikes you first about Bhi Bhimans music is his voice  a keening, gender-neutral yawp thats as earthy as it is ethereal, as puckish as it is wise. MORE..'),(34,1328155868,'Colombo','Shehan Karunatilaka wins DSC Prize for Chinaman','The US $50,000 DSC Prize for South Asian Literature which celebrates the richness and diversity of South Asian writing was awarded to Sri Lankan author Shehan Karunatilaka, for his novel Chinaman at the ongoing Jaipur Literature Festival. MORE..'),(35,1328439478,'Colombo','Hirunika to join active politics','The daughter of former MP Baratha Lakshman Premachandra, Hirunika Premachandra stated that she will join active politics through the Sri Lanka Mahajana Party.'),(36,1328439262,'Colombo','Health Ministry to amend laws concerning fake doctors','The Health Ministry is set to amend the laws concerning fraudulent doctors who have no qualifications in the medical field stating that a minimum fail sentence of five years should be given instead of the Rs.10,000 fine that is currently being implemented. MORE..'),(37,1328436306,'Colombo','Body found on the Kelani River','The body of a person who had drowned while bathing in the Kelani River was found today (February 5) by Naval officers, the police stated. MORE..'),(38,1328430758,'Colombo','Two suspects apprehended for running marijuana racket','Two suspects were apprehended for the operation of a large scale marijuana racket in the Bellanthara area while the Dehiwala police arrested the two in possession of four kilogrammes of marijuana. MORE..'),(39,1328421840,'Colombo','Two die and two injured after trishaw crashes into lorry','Two persons were killed when a trishaw crashed into a stationary lorry on the Maradankadawala-Habarana road in Kekirawa, police stated. Two other were critically injured and were rushed to hospital for treatment. MORE..'),(40,1328418180,'Colombo','Roads around Gangaramaya closed for Navam Perahera','Several roads around Gangaramaya will be closed on February 6 and 7 from 6.45pm until the end of the Navam Perahera, police stated.'),(41,1328417617,'Colombo','Two buses collide injuring 16 people','A SLTB bus and a private bus collided on the Hambantota-Tangalle road near the Sittikulama junction injuring and hospitalizing 16 people this morning at 6.45am police stated. MORE..'),(42,1328415637,'Colombo','Water cut in Dehiwala, Mt. Lavinia and Ratmalana','A water cut is currently being enforced in Dehiwala, Mount Lavinia and Ratmalana areas due to a breakdown while the Water Supply and Drainage Board stated that water will be restored soon.'),(43,1328414845,'Colombo','Three persons shot over dispute in Mawathagama','Three people were shot in the Mailagasweva area in Mawathagama last night at around 7pm following which the shooter had fled the scene, police stated. MORE..'),(44,1328378913,'Colombo','Heavy snowfall in London causes flight cancellations','Due to heavy snowfall expected in London, apt authorities in Heathrow have informed airlines of possible flight cancellations into the London Heathrow Airport on Sunday (February 5). MORE..'),(45,1328355173,'Colombo','Body of woman found floating in the Diyawannawa Oya','A body of a woman has been found floating in the Diyawannawa Oya near the Polduwa bridge in Kumbukgahaduwa today (February 4), the Welikada police stated. MORE..'),(46,1328351916,'Colombo','Four year old dies after speeding van crashes into tree','A four year old girl died in an accident after a speeding van lost control and crashed into a tree on the Padeniya-Anuradhapura road in Mahawa today (February 4), police stated. Six others were critically injured in the incident and were rushed to the Kurunegala hospital. MORE..'),(47,1328344500,'Colombo','President urges people to show courage amidst economic woes','President Mahinda Rajapakse marked Sri Lankas national day on Saturday by appealing to the country to show strength and courage in the face of a worsening global economic crisis. MORE..'),(48,1328340482,'Colombo','UPDATE: IPL teams splash the cash for Mahela and Murali','The Delhi Daredevils bought Sri Lankan captain Mahela Jayawardena for US $1.4million in the Indian Premier League player auction while spin legend Muttiah Muralitharan was bought for US $220,000 by the Royal Challengers Bangalore. MORE..'),(49,1328335569,'Colombo','One person killed and four injured in accident in Batticaloa','One person was killed and four others were critically injured when a vehicle drove off the road and crashed into a tree in the Valaichchenai area in Batticaloa, police stated. MORE..'),(50,1328331252,'Colombo','Executive powers will not be used against the people - President','Executive powers will not be used to go against the wishes of the people, the President stated in his Independence Day speech while adding that he the government is committed towards good governance and the independence of the judiciary system.'),(51,1328329596,'Colombo','Parliament, the most suitable to find solution to National issue','Parliament is the most suitable institution to find solutions to the National issue while all parties should unite to do so, President Mahinda Rajapaksa stated in his Independence Day message.'),(52,1328327510,'Colombo','The freedom in the country is cause to rejoice - President','The freedom to make decisions regarding the country and the people has been achieved and to watch that freedom being strengthened within the public is something to rejoice, President Mahinda Rajapaksa stated in his Independence Day message. MORE..'),(53,1328280815,'Colombo','Mahiyangana Kandy road closed due to land slide','The Mahiyangana Kandy road has been closed from Ududumbara due to a land slide. Motorists are advised to use alternate routes, Police stated.'),(54,1328265115,'Colombo','Suspect dies inside Court','A suspect who was arrested on charges of cannabis possession died at the Akkaraipattu Magistrate court today. Akkaraipattu Police had arrested the forty year old man today morning for the possession of cannabis. MORE...'),(55,1328616517,'Colombo','TNA meet US ambassador for war crimes ','Tamil National Alliance (TNA) MPs today (Feb. 07) afternoon met with Stephen Rapp, Ambassador at Large, Office of Global Criminal Justice at the US State Depart, while on his visit to Sri Lanka. '),(56,1328614174,'Colombo','Four Lankans jailed in UK for identity fraud ','Four Sri Lankan men have been jailed in the UK for their part in a conspiracy to supply fraudulent identity documents, the British High Commission said on Tuesday (07). MORE..'),(57,1328611202,'Colombo','Deyata Kirula exhibition extended ','The Deyata Kirula 2012 development exhibition held in Oyamaduwa area in Anuradhapura has been extended till February 12, the Presidents Media Division said today. MORE..'),(58,1328609767,'Colombo','Solution to national issue shouldnt be delayed: UNP ','The United National Party today said that finding a solution to the national problem should not be delayed under any circumstance.  MORE..'),(59,1328605138,'Colombo','Douglas takes moral responsibility for Choolaimedu incident ','Minister for Traditional Industries and Small Enterprises Douglas Devananda on Tuesday said that he took moral responsibility for the Choolaimedu firing in the 1986 where one person had died. MORE..'),(60,1328600677,'Colombo','Maldives president resigns amid protests ','Maldives President Mohamed Nasheed announced his resignation Tuesday following weeks of public protests over his controversial order to arrest a senior judge. MORE..'),(61,1328599218,'Colombo','National Drug Authority to sue 12 pharmacies in Apura ','The National Drug Regulatory Authority is to take legal action against 12 pharmacies in the Anuradhapura District following raids carried out in the past several days by its officers. MORE..'),(62,1328596566,'Colombo','Nine hand grenades found near Aluth Kade Court','A total of nine hand grenades have been discovered in close proximity to the Aluth Kade Court Complex, Military spokesman Brigadier Nihal Hapuarachchi said today. MORE..'),(63,1328594425,'Colombo','Few refugees recognized from Sun Sea, Ocean Lady - report','The refugee claims from the nearly 600 Sri Lankans who paid smugglers to ferry them to Canada are moving slowly and face dwindling odds of success, new statistics show. MORE..'),(64,1328592611,'Colombo','Six held for pelting stones at train ','Thalawa Police has arrested six individuals who had pelted stones at a train traveling towards Anuradhapura from Colombo and injuring one person. MORE..'),(65,1328589341,'Colombo','Elderly couple commits suicide in Ja-Ela','Police have commenced investigations into an incident where an elderly couple had allegedly committed suicide by hanging themselves at their residence in Awariyawatta, Ja-Ela. MORE..'),(66,1328584766,'Colombo','UPDATE: Keheliya admitted to hospital in Melbourne','Mass Media and Information Minister Keheliya Rambukwella was reportedly admitted to a hospital in Melbourne, Australia following an accidental fall, sources stated. MORE..'),(67,1328548663,'Colombo','US aiming to corner Sri Lanka at UN rights session','Minister Wimal Weerawansa on Monday claimed that US was working to haul President Mahinda Rajapaksa before the international court in The Hague over allegations of war crimes. MORE..'),(68,1328530704,'Colombo','Body found at Sri Pada Uda Maluwa ','A body has been discovered today (Feb. 06) morning at the Uda Maluwa of Sri Pada by Nallathanniya Police. The body of the  deceased, a 60-year-old resident of Ambalangoda, has been placed at the Maskeliya Hospital for postmortem examination. MORE..'),(69,1328522176,'Colombo','VIDEO: Fonseka not ready to apologize, discussions positive - Anoma','Anoma Fonseka the wife of the former Army Chief Sarath Fonseka today said that she will lead a protest to free her husband on February 8. She added that on February 8 it would be exactly two years since Fonseka was arrested. MORE...'),(70,1328517250,'Colombo','ICC ranking system means nothing - Murali','Ace Former Sri Lankan spinner Muttiah Muralitharan has put a question mark over Englands number one Test ranking criticising the International Cricket Councils ranking system. MORE...'),(71,1328513846,'Colombo','Philippines quake: No tsunami threat to Sri Lanka','6.8-magnitude earthquake struck Monday off the third-largest island in the Philippines, prompting the country to issue a tsunami alert for the coastlines near the epicenter. However when contacted by Ada Derana the Sri Lankan Meteorology Department said that there is no tsunami threat to the country. MORE...'),(72,1328511016,'Colombo','Mine clearance could take 10 years or more - UNDP','Landmine clearance in Sri Lankas conflict-affected north could take more than a decade, experts say. It is expected to take [in] excess of 10 years to fully mitigate all remaining contamination in Sri Lanka, the Mine Action Project of the UN Development Programme (UNDP) in Sri Lanka told IRIN...'),(73,1328508719,'Colombo','Three Lankans arrested for attempting to flee TN','Three Sri Lankans were arrested in Rameswaram, Tamil Nade today for trying to flee the island town to Sri Lanka without proper documents, Indian police said. They said Nishant (43) and Abdul Kalam were released from Puzhal Central jail a few days back after serving a 11 year sentence for smuggling heroin in 2001. MORE...'),(74,1328505771,'Colombo','Woman immolates self in Grandpass','A young woman has immolated herself in Grandpass, Colombo. Police said the 22-year-old woman was admitted to the Colombo National Hospital last evening with severe burn injuries and had succumbed to injuries today (06) morning. MORE..'),(75,1328505771,'Colombo','M.I.A. middle finger upstages Madonnas Super Bowl','The NFL and a major television network are apologizing for another Super Bowl halftime show. MORE..'),(76,1328876624,'Colombo','Australia beat Sri Lanka in close finish','Australia defeated Sri Lanka by 5-runs in their tri-series one-day international in Perth. Angelo Mathews (64) was the final wicket to fall as Sri Lanka, chasing 232, fell short by 5 runs.'),(77,1328875349,'Colombo','Two coaches arrested over death of boxing student ','The two instructors of the student who died after sustaining an injury during boxing training have been arrested. MORE..'),(78,1328873720,'Colombo','Govt. to compensate kin of fishermen killed in storm','The government has decided to pay Rs.100, 000 as compensation to the family members of fishermen who were killed and lost at sea due to the heavy rains and gale winds that lashed the Southern coastal areas of the island in November last year. MORE..'),(79,1328870640,'Colombo','Wife, brother, brother-in-law get death sentence for husbands murder ','The Embilipitiya High Court today sentenced to death three individuals accused of man slaughter. The three were convicted of a murder which had taken place in the Sooriyawewa area in Embilipitiya in July, 1993. MORE..'),(80,1328865455,'Colombo','Pakistan to grant US$ 200 million ECF','The Government of Pakistan has agreed to extend an Export Credit Facility of US$ 200 million through the State Bank of Pakistan. The loan agreement is to be signed during President Mahinda Rajapaksas current visit to Pakistan, the Government Information Department reports. MORE..'),(81,1328861406,'Colombo','Australia restricted to 231','Australia were all out for 231 against Sri Lanka in the third ODI of the Commonwealth Bank series. Michael Clarke top scored with 57 runs off 88 balls. MORE..'),(82,1328858365,'Colombo','Injunction issued against erecting car park in Kelaniya','The Supreme Court today issued an injunction order preventing the Western Province Road Development Authority from constructing a parking lot at a private property in Kiribathgoda, Kelaniya. MORE..'),(83,1328855478,'Colombo','Golden Key case to be heard on March 9','The Colombo High Court has directed that the case regarding the Golden Key financial fraud to proceed for hearing on March 09, after defence attorneys had requested for time to prepare for the trial. MORE..'),(84,1328851021,'Colombo','Rs.7 million funds collected for Sirikotha repairs  ','The United National Party says that so far close to Rs. 7 million in funds have been collected for repairs on the party headquarters  Sirikotha, which was attacked by angry supporters following the leadership election in December. MORE..'),(85,1328848289,'Colombo','Student dies in hospital following boxing injury','An 18 year old student from Dharmapala Vidyalaya in Pannipitiya who was hospitalized after taking a hit from his opponent during boxing practices on Sunday (February 5), died early this morning (Feb 10) in hospital. MORE..'),(86,1328846252,'Colombo','Mob attacks Maldives National Museum','Several historical artifacts exhibited at the Maldives National Museum, including Buddhist statues were destroyed in a mob attack on Wednesday morning, an act of vandalism that is said to have caused unimaginable damage to the treasured Maldivian heritage. MORE..'),(87,1328842369,'Colombo','IGP ordered to provide security to Nasheeds wife','President Mahinda Rajapaksa has instructed the Inspector General of Police, N.K. Illangakoon to provide security to the wife of former Maldivian President who is in Sri Lanka currently, the Government Information Department stated.'),(88,1328808357,'Colombo','Ranil to make special statement in Parliament tomorrow','Opposition Leader Ranil Wickremasinghe is due to deliver a special statement at Parliament tomorrow (February 10) a senior MP of the United National Party (UNP) stated. MORE..'),(89,1328791023,'Colombo','AUDIO: Arrest warrant for Nasheed suspended','The arrest warrant issued for the former president of Maldives, Mahamed Nasheed has been temporarily suspended, reporter from Male said. MORE..'),(90,1328790920,'Colombo','Lankan driver admits biting girl while playing vampires','A Sri Lankan driver in Dubai claimed that he bit a 6-year-old schoolgirls cheeks and neck while playing with her a vampires game as he denied his molestation charges in court Thursday. MORE..'),(91,1328785360,'Colombo','UNP decides to empower electorates - Premadasa','The UNP Working Committee has decided to strengthen its electorates and empower its grassroots, UNP Deputy Leader Sajith Premadasa said today. To enable such empowerment the Working Committee decided to appoint new group of organizers. MORE...\n'),(92,1328782510,'Colombo','EXCLUSIVE: Im prepared to be arrested - Nasheed','Former Maldivian President Mohamed Nasheed in an exclusive interview to Ada Derana a short while ago said that he is prepared to be arrested. The police might come any time now to arrest me, I am prepared, he said. MORE...'),(93,1328781018,'Colombo','President inquires about Nasheeds safety ','President Mahinda Rajapaksa has telephoned former Maldivian President Mohamed Nasheed and inquired about his safety, Presidents Spokesman Bandula Jayasekara said.  '),(94,1328778719,'Colombo','Arrest warrant issued for Mohamed Nasheed','A criminal court in the Maldives has issued an arrest order for former president Mohamed Nasheed and his former defence minister, officials from his party told AFP today. MORE..'),(95,1328777787,'Colombo','Those against impunity have forgotten the past','Those who rise against impunity today have forgotten the past, says Petroleum Industries Minister Susil Premajayantha. MORE..'),(96,1328777787,'Colombo','Naomi Watts takes Princess Diana role in new movie','Actress Naomi Watts will play Britains Princess Diana in a new feature film about the last two years of her glamorous life that ended in tragedy, Britains Ecosse Films said on Thursday. MORE..'),(97,1329035713,'Colombo','Jobs provided the wrong way: unemployed grads','The government is not following the correct procedure when providing graduates with employment, says the Joint Unemployed Graduates Union. MORE..'),(98,1329030317,'Colombo','LPBOA to strike; other unions refuse to join  ','The Lanka Private Bus Owners Association (LPBOA) says it will continue with the proposed strike and withdraw from operating buses from midnight today (Feb. 12) after diesel prices were increased last night. MORE..'),(99,1329026854,'Colombo','Thondaman forced to leave Coimbatore following protests','In the second such incident in about month, a Sri Lankan minister was forced to leave Coimbatore on Saturday after a group of Naam Tamilar Katchi activists staged a demonstration in front of his hotel, demanding that he leave India immediately. MORE..'),(100,1329022333,'Colombo','17 Police OICs transferred','Seventeen Officers-in-Charge of Police stations have been transferred to other stations with immediate effect. The transfers were made according to a directive by the Inspector General of Police (IGP), police spokesman SP Ajith Rohana stated. MORE..'),(101,1329016852,'Colombo','8 hour water cut today - Water Board','An 8 hour water cut will be enforced today (February 11) from 9am to 5pm in areas coming under water supply schemes of Matara, Mirissa, Malimbada, Devinuwara, Gandara, Kottegoda, Dikwella and Weligama, the Water Supply and Drainage Boards stated. MORE..'),(102,1329013579,'Colombo','Whitney Houston dies at age 48','Whitney Houston, who ruled as pop musics queen until her majestic voice and regal image were ravaged by drug use, erratic behavior and a tumultuous marriage to singer Bobby Brown, has died. She was 48. MORE..'),(103,1328981085,'Colombo','Bus strike tomorrow due to fuel hike','Private bus operators will go on a strike from midnight tomorrow (February 11) after diesel prices were increased by Rs.31 per litre, Private Bus Owners Association President Gemunu Wijeyratne stated. MORE..'),(104,1328973619,'Colombo','Petrol to be increased by Rs.12; diesel by 31','A litre of petrol will be increased by Rs.12, diesel by Rs.31 and kerosene by Rs.35 with effect from midnight today, the Ministry of Petroleum stated.'),(105,1328971235,'Colombo','Oil prices to be revised; transport & fisheries sectors to get concessions','Oil prices will be revised from tonight but concessions will be given to private and public transport and fishery sectors, Government Information Department stated.'),(106,1328958672,'Colombo','US government official meets with new Maldives leader','The new president of the Maldives said Saturday that he was ready to face an independent investigation into the transfer of power in the Indian Ocean nation that his predecessor alleges was a coup. MORE..'),(107,1328953692,'Colombo','Keheliya undergoes minor surgery','The Media Minister Keheliya Rambukwella who is currently in a hospital in Melbourne, Australia underwent a minor surgery after sustaining leg injuries in an accident. MORE..'),(108,1328949942,'Colombo','Counterfeit currency mafia turns to Sri Lanka','The counterfeit currency mafia has been turning to Sri Lanka as a new transit point, revealed the recent investigations carried out by the Crime Branch and the National Investigation Agency (NIA). MORE..'),(109,1328946446,'Colombo','Talks between private bus operators and govt. positive','The talks between the private bus operators and the government regarding the fuel concessions for private buses were positive, the Private Bus Owners Association President, Gemunu Wijeyratne sated. MORE..'),(110,1328941444,'Colombo','Bus operators in Horana on strike','The private bus operators in the Horana area have gone on strike with the 120 Colombo-Horana buses and all other buses operating from the Horana bus depot joining in the protest. MORE..'),(111,1328935292,'Colombo','Man arrested with stock of marijuana','A man was arrested in possession of over three and a half kilogrammes of marijuana by police in Kaththankudi while police claimed that initial investigations revealed that the suspect carried the stock intending to sell it. MORE..'),(112,1328932449,'Colombo','PAFFREL makes special request of Elections Commissioner','The Peoples Action for Free and Fair Elections (PAFFREL) organization has made a special request of the Elections Commissioner to protect the votes of the people with regards to the Pudukuduirippu and Muhudubadapattu local government elections. MORE..'),(113,1328899312,'Colombo','Maldives ex-president Nasheed demands election, warns of protests','MALE (Reuters): The former president of the Maldives, Mohamed Nasheed, demanded on Friday fresh elections and said he would organise street protests in the Indian Ocean archipelago best known as a luxury beach getaway if polls were not called.  READ MORE.....'),(114,1328897437,'Colombo','Visit Lanka for fair analysis on facts, not fiction: HC Dr. Nonis','Sri Lankas High Commissioner in the United Kingdom, Dr. Chris Nonis has called on all those in the international community to visit Sri Lanka, so they may make a fair, objective and impartial analysis of the countrys post-conflict progress based on facts not fiction.  READ MORE.....'),(115,1328890596,'Colombo','Zardari calls for expanding Pak-Sri Lanka bilateral trade&#8206;','President of Pakistan Asif Ali Zardari on Friday called for stepping up efforts to fully realize the potential of Free Trade Agreement with Sri Lanka and building a mutually beneficial economic and trade partnership to jack up the bilateral trade from current $375 million to $2 billion target in the next three years. MORE..'),(116,1328888419,'Colombo','Cabinet sub-committee to monitor HR Action Plan','The government has decided to appoint a Cabinet Sub-Committee to monitor the process of speedy implementation of the proposals in the Human Rights Action Plan, Acting Cabinet Spokesperson and Minister Anura Priyadarshana Yapa told the Cabinet press briefing today.  MORE..'),(117,1328888419,'Colombo','Whitney Houston dies at age 48','Whitney Houston, who ruled as pop musics queen until her majestic voice and regal image were ravaged by drug use, erratic behavior and a tumultuous marriage to singer Bobby Brown, has died. She was 48. MORE..'),(118,1329222959,'Colombo','Fuel hike due to govts debts: UNP','The United National Party (UNP) says the government is burdening the public by raising fuel prices because it is exceedingly indebted. Sri Lanka has turned into a country which is excessively dependant on loans, the partys General Secretary Tissa Attanayake said. MORE..'),(119,1329218894,'Colombo','India and Sri Lanka share dramatic tie ','India (236/9) tied against Sri Lanka in the 5th One Day International of the Commonwealth Bank Series at Adelaide Oval a short while ago. Gautam Gambhir top scored with 91. MORE..'),(120,1329217421,'Colombo','Duplication Road inundated due to heavy rain','Duplication Road in Colombo is inundated due heavy downpour, says the Disaster Management Center. Therefore motorists are advised to use alternative routes. '),(121,1329215832,'Colombo','Stocks slide 4%, rupee hits record low','The Colombo Stock Market fell more than 4.5 percent in early trade on Tuesday, breaking through the psychological 5,000-point barrier, as margin calls mounted and the rupee hit a record low. MORE..'),(122,1329210756,'Colombo','Fishermen given diesel and kerosene subsidies ','A subsidy of Rs. 12 per litre of diesel will be granted for one-day and multiday fishing boats while fishermen will also be given a subsidy of Rs. 25 per litre of kerosene, Fisheries and Aquatic Resources Minister Rajitha Senaratne said. MORE..'),(123,1329205280,'Colombo',' Woman sentenced to death for killing illicit lover ','A woman charged with murder was sentenced to death by the Kegalle High Court today (Feb. 14). She was accused of carrying out an acid attack on her alleged lover on February 07, 2006 which resulted in his death. MORE..'),(124,1329204809,'Colombo','Dead body found on Torrington Avenue','A dead body was found between Torrington Avenue and Boteju Mawatha in Colombo 5 this morning (February 14) by the Narahenpita Police, Police Spokesman SP Ajith Roahan stated. MORE..'),(125,1329202635,'Colombo','India limit Sri Lanka to 236/9','India restricted Sri Lanka to 236 for 9 at the end of 50 overs in their Commonwealth Bank Series clash at Adelaide Oval on Tuesday as emerging batsman Dinesh Chandimal top-scored with 81. MORE..'),(126,1329202365,'Colombo','Bus fares on Southern Expressway increase by Rs.70','The bus fare from Colombo to Galle on the Southern Expressway has been increased from Rs.400 to Rs.470 with effect from today (February 14), the National Transport Board Chairman Roshan Gunawardena stated.'),(127,1329202037,'Colombo','Decision on power tariff revision tomorrow ','The Public Utilities Commission of Sri Lanka (PUCSL) is to provide its final decision regarding an electricity tariff revision tomorrow (Feb. 15) while an official of the commission hinted that electricity tariffs are likely to increase. MORE..'),(128,1329199516,'Colombo','Predeniya arts students boycott lectures ','Arts Faculty students of the Peradeniya University are boycotting classes from today in protest to the expulsion of the arts faculty students union leader and the arrest and imprisoning of three students. MORE..'),(129,1329195639,'Colombo','PS member assaulted by MP Nimal Wijesinghe','A member of the Rideegama Pradeshiya Sabha has allegedly been attacked by a Member of Parliament. The PS members was abducted and assaulted by Kurunegala District MP Nimal Wijesinghe, claims Rideegama Pradeshiya Sabha Chairman Kumari Pallemulla. MORE..'),(130,1329192443,'Colombo','Discussion to decide on fuel concessions for Fishermen','A special discussion on providing fuel concessions to fishermen will take place today (February 14), the Fisheries Minister Rajitha Senaratne stated. The discussion will take place between the representatives of the National Fisheries Federation and the Ministry officials. MORE..'),(131,1329181300,'Colombo','Pillay raises concern about Shavendra to Ban','UN human rights chief Navi Pillay said on Monday that she has raised concerns in a letter to Secretary-General Ban Ki-moon about the appointment of a Sri Lankan army general to Bans senior advisory panel on peacekeeping. MORE...'),(132,1329153165,'Colombo','Electricity tariff hike next?','Electricity tariffs would also be increased before long as a result of the dramatic rise in fuel prices, government sources say. MORE..'),(133,1329140434,'Colombo','Bus fares increased by 20%','All bus fares including private and SLTB fares will be increased by 20% with the minimum fare of Rs.9 with effect from midnight today.'),(134,1329137722,'Colombo','Bus strike called off','Private bus operators have decided to call off the strike after discussions with the authorities, the Lanka Private Bus Operators Association (LPBOA) stated. MORE..'),(135,1329133875,'Colombo','US to support resolution against Sri Lanka at UNHRC','The US will support a resolution against Sri Lanka at the UN Human Rights Council, Assistant Secretary of State Robert Blake said today, asserting that the Lankan government has not done enough to implement the LLRC recommendations. MORE..'),(136,1329129059,'Colombo','Four remanded for attacking buses; 46 arrests so far ','Four persons out of the 29 arrested for attacking private buses operating in Narahenpita were ordered remanded by the Colombo Magistrates Court today (Feb. 13). MORE..'),(137,1329126871,'Colombo','Australia criticises Sri Lankas LLRC report','Australia has added its voice to international criticism of the Sri Lankan government report on the countrys civil war but stopped short of joining calls for a fresh, independent inquiry. MORE..'),(138,1329126871,'Colombo','Adele sweeps 54th Grammy Awards','Soul singer Adele triumphed over Rihanna, Bruno Mars and Lady Gaga to win the Album of the Year award for her chart-topping 21 and five other trophies at the 54th Grammy awards. MORE..'),(139,1329363873,'Colombo','Lankan Army officers bag stolen on Indian train','A Sri Lankan army officers bag containing cash, passport and other valuables was stolen from the Malwa Express soon after it left the New Delhi railway station on February 13. MORE..'),(140,1329362366,'Colombo','Two children die following landslide','Two children aged 11 and 16 were killed after a mound of earth fell on their home on the Welimada-Nuwara-Eliya road early this morning (February 16), police stated. MORE..'),(141,1329355160,'Colombo','Tamil Nadu keen on retrieving Katchatheevu from Sri Lanka','Reiterating its earlier stand on the retrieval of Katchatheevu from Sri Lanka, the Tamil Nadu government has stated that restoration of traditional fishing rights of Indian fishermen, which if not implemented, will mean that Tamil Nadu fishermen will have to stop fishing and starve. MORE...'),(142,1329323651,'Colombo','Curfew imposed in Chilaw ','Police curfew has been imposed in Chilaw town area till 6 a.m. tomorrow (February 16). Chilaw Police said the curfew was imposed in order to maintain law and order and control unrest in the area, after one person was shot dead during a demonstration by fishermen earlier today. MORE..'),(143,1329303126,'Colombo','VIDEO: Police fire teargas at JVP protest ','Police fired tear gas and used water cannon in an attempt to disperse a JVP led demonstration in Maligawatta a short while ago, the Ada Derana reporter confirms.'),(144,1329302954,'Colombo','Southern Province SLTB bus operators end strike','The Southern Province Sri Lanka Transport Board (SLTB) buses have ended the strike they began earlier today for demands that were still not met by the government.'),(145,1329300603,'Colombo','VIDEO: Bus operators prepared to reduce fares if subsidy is granted','The Private Bus Owners Association (PBOA) stated that it is ready to reduce bus fares if the government presents a transparent mechanism for providing fuel subsidies without the involvement of the National Transport Commission (NTC). MORE..'),(146,1329300173,'Colombo','UPDATE: Army to probe LLRC observations, Channel 4 video','The Army Commander Jagath Jayasuriya has appointed a member Court of Inquiry to probe into the observations made by the Lessons Learnt and Reconciliation Commission(LLRC) on alleged civilian casualties during the final stage of the war and the content of the Channel 4 video. MORE...'),(147,1329296911,'Colombo','Fuel surcharge imposed on Electricity bills, 25-40% on households','(UPDATE) A fuel surcharge of 25% to 40% will be imposed with effect from midnight today on electricity bills for household users based on use, the Chairman of the Public Utilities Commission of Sri Lanka (PUCSL) said today. MORE...'),(148,1329293214,'Colombo','Sri Lanka strengthens economic ties with Singapore','Singapore and Sri Lankas business federations have signed a memorandum of understanding (MOU) to promote investment relations between the two countries. MORE..'),(149,1329288720,'Colombo','One person killed following shooting in Chilaw','One person was killed following a shooting during a demonstration by fishermen in Chilaw town a short while ago, Chilaw hospital sources stated. MORE..'),(150,1329288325,'Colombo','VIDEO: Tense situation in Chilaw after police fire teargas ','A tense situation has erupted in Chilaw after police fired teargas at protesters a short while ago. A shooting has also been reported in the area while Chilaw hospital sources stated that several injured parties have been admitted to hospital.'),(151,1329286383,'Colombo','Southern Province SLTB bus operators on strike','The Southern Province Sri Lanka Transport Board(SLTB) busses have commenced a strike, a Matara depot spokesman told Ada Derana. He added that the decision to strike was taken over demands not yet met. MORE...'),(152,1329285221,'Colombo','Court summons respondents again over Lalith and Kugan petition','The Court of Appeal today (February 15) once again ordered the respondents related to the petition filed by the relatives of missing activists Lalith Kumar Weeraraj and Kugan Muruganathan to present themselves in Court. MORE..'),(153,1329283915,'Colombo','Norway apologizes for issuing LTTE stamps','The Norwegian Postal Authority, Posten Norge, has issued an apology to the Sri Lankan Ambassador in Oslo, E. Rodney M. Perera, for the recent issuance of LTTE stamps in Norway. MORE...'),(154,1329280963,'Colombo','More heavy showers  Met. Dept.','Heavy showers expected in the Northern, Eastern, Central, Uva and other parts of the island today due to a disturbance in the atmosphere, the Meteorological Department said. Meanwhile heavy traffic congestion was reported in most parts of Colombo due to the inclement weather that prevailed.'),(155,1329277915,'Colombo','Police Constable shoots himself over love affair','A police constable in the service of the Thalangama Police used his official firearm to shoot and kill himself last night (February 15), Police Spokesman SP Ajith Rohana stated. The police constable had shot himself over a love affair, police further revealed. MORE..'),(156,1329276742,'Colombo','New Parliament General Secretary assumes duties today','Dhammika Dissanayake will assume his duties as Parliament General Secretary today (February 15). Dissanayake served as the Deputy General Secretary to the Parliament before he was appointed for his role by the President. MORE..'),(157,1329272846,'Colombo','Singapore names new Orchid, Mahinda-Shiranthi','Singapore named a new Orchid Mahinda-Shiranthi, the Presidential Spokesman stated. President Mahinda Rajapaksa will visit Singapore upon the invitation of its President today (February 15).'),(158,1329268874,'Colombo','Sri Lanka says UN concerns about general unethical','Sri Lankas U.N. mission on Tuesday dismissed as unfair and unethical concerns raised by U.N. human rights chief Navi Pillay about the appointment of a Sri Lankan army general to an advisory panel on peacekeeping. MORE...'),(159,1329532534,'Colombo','Court orders family of fisherman to avoid violence today','Upon the request of the Police, court has ordered the family of the fisherman who was killed in a protest in Chilaw to avoid any violence during the funeral today (February 18).'),(160,1329491714,'Colombo','15 police officers injured in UNP protest - Police','At least fifteen (15) police officers inclusive of three Deputy Inspector Generals (DIGs) were injured when UNP protestors acted in a provocative manner in Colombo Fort today, the Government Information Department quoting Police Spokesman SP Ajith Rohana said. MORE..'),(161,1329481116,'Colombo','Jayalath Jayawardena hopitalized after UNP protest','UNP Gampaha District MP Dr. Jayalath Jayawardena has been admitted to the Colombo National Hospital after suffering injuries during the UNP protest in Fort, which was dispersed by police using tear gas. MORE..'),(162,1329479119,'Colombo','Road in front of Fort Railway Station closed','The road in front of the Fort Railway Station has been closed due to the UNP demonstration. Police had used tear gas in an attempt to disperse the protest against the fuel price hike.  '),(163,1329478309,'Colombo','Maldives has best relationship with Sri Lanka: President Waheed','Sri Lanka providing refuge to former President Mohamed Nasheeds family will have no affect on the relationship between the current Maldivian government and Colombo, says new President Dr. Mohamed Waheed Hassan comparing the two nations to brother and sister. MORE..'),(164,1329476744,'Colombo','Police fire tear gas at UNP protest','Police fired tear gas at a protest organized by the United National Party today (Feb. 17) in front of the Colombo Fort railway station against the increase in fuel prices. MORE..'),(165,1329475203,'Colombo','Sri Lanka cruise to 8 wicket win','  Sri Lanka cruised to an 8-wicket victory over Australia by reaching the required 152 runs in just 24.1 runs in the sixth ODI of the ongoing CB series at the SCG. Skipper Mahela Jayawardena led from the front as he scored an unbeaten 61 runs while earning Sri Lanka a bonus point. '),(166,1329473238,'Colombo','Sangakkara reaches 10,000 ODI runs','Kumar Sangakkara reached 10,000 runs in One Day Internationals a short while ago against Australia in Sydney. Sangakkara is the third Sri Lankan to reach the milestone having played 315 matches. MORE..'),(167,1329471323,'Colombo','Govt. grants three-wheelers fuel subsidy','Three-wheel drivers will be provided with a subsidy of Rs.10 per litre of petrol, up to three litres per day for 25 per month, General Secretary of the SLFP Minister Maithreepala Sirisena said today.'),(168,1329466943,'Colombo','Lankan bowlers restrict Aussies to 158','David Husseys half-century helped Australia set Sri Lanka a score of 152 runs as victory target according to the D/L method in the sixth ODI of the ongoing CB series at the SCG on Friday. MORE..'),(169,1329465523,'Colombo','GMOA asks govt. for increase in allowances','The Government Medical Officers Association (GMOA) has requested the government to effectively increase the attendance and transport allowances of the doctors. MORE..'),(170,1329460817,'Colombo','2-year-old hit and killed by tractor','A 2-year-old child was killed today (Feb. 17) morning in Radaliyadda, Bibila after he was hit by a tractor, engaged in illegal sand transportation. MORE..'),(171,1329458738,'Colombo','BOC to release Rs.600mil to pay SLC wages','The Bank of Ceylon (BOC) has agreed to release Rs.600 million to settle the player payments of Sri Lanka Cricket while the pending salaries will be paid by February 28, the Sports Ministry stated. MORE..'),(172,1329454082,'Colombo','Bakery owners to decide on price hike today ','The All Ceylon Bakery Owners Association says it will reach a final decision today (Feb. 17) regarding an increasing in prices of bakery products, due to the recent fuel price hike. MORE..'),(173,1329449491,'Colombo','UNP protest against fuel hike this evening','The UNP have organized a protest against the recent fuel hike in Colombo today (February 17) evening while UNP General Secretary Tissa Attanayake stated that all the opposition parties are welcome to join the protest. MORE..'),(174,1329443062,'Colombo','Sri Lanka Army inquiry a delaying tactic - HRW','The Sri Lankan armys announcement that it had appointed a five-member court of inquiry to investigate allegations that its forces committed serious violations of the laws of war appears to be another government delaying tactic in the face of mounting international pressure, Human Rights Watch said today. MORE...'),(175,1329414512,'Colombo','India pitches for early conclusion of trade, services pact','India made a strong case for an early conclusion and scheduling of SAARC Agreement on Trade and Services as well as better arrangement for movement of cargo and passenger vehicles within the region, at the SAFTA Ministerial Council Meeting here (Islamabad) on Thursday. MORE..'),(176,1329397528,'Colombo','Seventeen hospitalised after lightning strike','Sixteen army personnel and a civilian were taken to the Matara-Kumburupitiya hospital after they were struck by lightning in the Kumburupitiya area a short while ago, the Disaster Management Centre reported.'),(177,1329390020,'Colombo','Govt. appoints taskforce for 2013 SAARC games in New Delhi','The government has appointed a taskforce in order to compete more successfully at the 2013 SAARC games being held in New Delhi India, Sports Minister Mahindananda Aluthgamage stated. MORE..'),(178,1329385128,'Colombo','Meter Taxi fares go up','Three wheel taxi fare will be increased by Rs. 2 per kilometer from midnight today due to the recent fuel price hike, the Secretary of the Meter Taxi Services Association Lal Kalinga said. MORE...'),(179,1329385128,'Colombo','Coca-Cola wins SLIM Peoples Choice Award','Leaders in the beverage industry - Coca-Cola, stamped its authority at the SLIM  Neilsen Peoples Awards 2012 held recently, by being awarded Winners of the prestigious Youth Beverage Brand of the Year.');
/*!40000 ALTER TABLE `News` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Notification`
--

DROP TABLE IF EXISTS `Notification`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Notification` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `taskId` int(11) NOT NULL,
  `datetime` int(11) NOT NULL,
  `notified` tinyint(1) NOT NULL,
  `snooze` tinyint(1) NOT NULL,
  `email` tinyint(1) NOT NULL,
  `sms` tinyint(1) NOT NULL,
  `voicecall` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_A765AD32D34FCA37` (`taskId`),
  CONSTRAINT `FK_A765AD32D34FCA37` FOREIGN KEY (`taskId`) REFERENCES `Task` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Notification`
--

LOCK TABLES `Notification` WRITE;
/*!40000 ALTER TABLE `Notification` DISABLE KEYS */;
/*!40000 ALTER TABLE `Notification` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Product`
--

DROP TABLE IF EXISTS `Product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `price` double NOT NULL,
  `description` longtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Product`
--

LOCK TABLES `Product` WRITE;
/*!40000 ALTER TABLE `Product` DISABLE KEYS */;
/*!40000 ALTER TABLE `Product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Schedule`
--

DROP TABLE IF EXISTS `Schedule`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Schedule` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `datetime` int(11) NOT NULL,
  `command` varchar(63) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Schedule`
--

LOCK TABLES `Schedule` WRITE;
/*!40000 ALTER TABLE `Schedule` DISABLE KEYS */;
INSERT INTO `Schedule` VALUES (1,1329534410,'weather:update Colombo'),(2,1329535781,'weather:update Colombo'),(3,1329535857,'weather:update Colombo'),(4,1329535972,'weather:update Colombo'),(5,1329562790,'weather:update Colombo'),(6,1329574470,'weather:update Colombo'),(7,1329574605,'weather:update Colombo'),(8,1329575811,'weather:update Colombo'),(9,1329617169,'weather:update Colombo'),(10,1329619795,'weather:update Colombo'),(11,1329621908,'weather:update Colombo'),(12,1329643692,'calendar:syncfacebook osh'),(13,1329644518,'calendar:syncfacebook osh'),(14,1329644606,'calendar:syncfacebook osh'),(15,1329644734,'calendar:syncfacebook oshan'),(16,1329645031,'weather:update Colombo'),(17,1329647327,'weather:update Colombo');
/*!40000 ALTER TABLE `Schedule` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Task`
--

DROP TABLE IF EXISTS `Task`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Task` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `task` varchar(255) NOT NULL,
  `endTime` int(11) NOT NULL,
  `calendarId` int(11) DEFAULT NULL,
  `description` longtext NOT NULL,
  `location` varchar(255) NOT NULL,
  `lng` double NOT NULL,
  `lat` double NOT NULL,
  `userId` int(11) NOT NULL,
  `taskTypeId` int(11) DEFAULT NULL,
  `startTime` int(11) NOT NULL,
  `taskRepeatId` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_F24C741B2D4F56A6` (`calendarId`),
  KEY `FK_F24C741BD1C4661A` (`taskTypeId`),
  KEY `IDX_F24C741B21F0771C` (`taskRepeatId`),
  CONSTRAINT `FK_F24C741B21F0771C` FOREIGN KEY (`taskRepeatId`) REFERENCES `TaskRepeat` (`id`),
  CONSTRAINT `FK_F24C741B2D4F56A6` FOREIGN KEY (`calendarId`) REFERENCES `Calendar` (`id`),
  CONSTRAINT `FK_F24C741BD1C4661A` FOREIGN KEY (`taskTypeId`) REFERENCES `TaskType` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=71 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Task`
--

LOCK TABLES `Task` WRITE;
/*!40000 ALTER TABLE `Task` DISABLE KEYS */;
INSERT INTO `Task` VALUES (2,'Meeting',1327915800,0,'Meeting in BMICH','BMICH',79.872249709508,6.9010668381211,1,2,1327915800,1),(3,'Meeting',1327915800,0,'Meeting in BMICH','BMICH',79.872249709508,6.9010668381211,1,2,1327915800,1),(4,'Party',1327915800,0,'Party in BMICH','BMICH',79.872249709508,6.9013083279225,1,2,1327915800,1),(7,'Meeting',1327915800,0,'Meeting in BMICH','BMICH',79.872249709508,6.9013083279225,1,2,1327915800,1),(8,'Party',1328423400,0,'Party in IIT','IIT',79.85987663269,6.86516632775,1,2,1328423400,1),(13,'Visitng Lecture',1327915800,0,'Visiting Lecture in IIT','IIT',79.85987663269,6.86516632775,1,2,1327915800,1),(16,'Hangout',1328509800,0,'Hangout in IIT','IIT',79.85987663269,6.86516632775,1,2,1328509800,1),(17,'Course',1328509800,0,'Course in IIT','IIT',79.85987663269,6.86516632775,1,2,1328509800,1),(19,'Meeting',1359095400,0,'Meeting in IIT','IIT',79.85987663269,6.86516632775,1,2,1359095400,1),(20,'Meeting',1328423400,0,'Meeting in IIT','IIT',79.85987663269,6.86516632775,1,2,1328423400,1),(23,'Meeting',1328769000,0,'Meeting in Mihilaka Medura BMICH','Mihilaka Medura BMICH',79.873769,6.900086,1,2,1328769000,1),(24,'Meeting',1329114600,0,'Meeting in BMICH','BMICH',79.855185897799,6.8934181754275,1,2,1329114600,1),(25,'Meeting',1329471000,0,'Meeting in BMICH','BMICH',79.872249709508,6.9013083279225,1,2,1329463800,1),(26,'Meeting',1329471000,0,'Meeting in BMICH','BMICH',79.872249709508,6.9013083279225,1,2,1329463800,1),(27,'Meeting',0,NULL,'Meeting in BMICH','BMICH',79.872249709508,6.9013083279225,1,2,1329460200,1),(28,'Meeting',0,NULL,'Meeting in BMICH','BMICH',79.872249709508,6.9010668381211,1,2,1329460200,1),(29,'Meeting',0,NULL,'Meeting in BMICH','BMICH',79.872249709508,6.9010668381211,1,2,1329460200,1),(30,'Meeting',0,NULL,'Meeting in BMICH','BMICH',79.872249709508,6.9010668381211,1,2,1329460200,1),(31,'Meeting',0,NULL,'Meeting in BMICH','BMICH',79.872249709508,6.9010668381211,1,2,1329460200,1),(62,'The End of The World',1356285600,38,'http://www.facebook.com/events/133981956624792','Party On The Beach',79.988773,6.444053,1,2,1356028200,1),(63,'\"Journey Through Nature\" Scout Exploration Competition 2012',1329571800,38,'http://www.facebook.com/events/161588817273684','Digana Raja Maha Viharaya',79.964462711396,6.8328837084845,1,2,1329525000,1),(65,'The Annual General Meeting 2012',1329039000,38,'http://www.facebook.com/events/276806262375128','Mount Lavinia',79.867125443904,6.8409822122557,1,2,1329017400,1),(70,'Harry Pereira\'s Birthday',0,39,'##Harry Pereira##','',0,0,1,5,1351621800,5);
/*!40000 ALTER TABLE `Task` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `TaskRepeat`
--

DROP TABLE IF EXISTS `TaskRepeat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `TaskRepeat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `TaskRepeat`
--

LOCK TABLES `TaskRepeat` WRITE;
/*!40000 ALTER TABLE `TaskRepeat` DISABLE KEYS */;
INSERT INTO `TaskRepeat` VALUES (1,'No Repeat',''),(2,'Daily',''),(3,'Weekly',''),(4,'Monthly',''),(5,'Yearly',''),(6,'4 Years',''),(7,'Century','');
/*!40000 ALTER TABLE `TaskRepeat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `TaskType`
--

DROP TABLE IF EXISTS `TaskType`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `TaskType` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `duration` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `TaskType`
--

LOCK TABLES `TaskType` WRITE;
/*!40000 ALTER TABLE `TaskType` DISABLE KEYS */;
INSERT INTO `TaskType` VALUES (1,'All Day',0),(2,'Other',30),(3,'Party',360),(4,'Meeting',120),(5,'Birthday',0);
/*!40000 ALTER TABLE `TaskType` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Users`
--

DROP TABLE IF EXISTS `Users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `username_canonical` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_canonical` varchar(255) NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  `salt` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `locked` tinyint(1) NOT NULL,
  `expired` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  `confirmation_token` varchar(255) DEFAULT NULL,
  `password_requested_at` datetime DEFAULT NULL,
  `roles` longtext NOT NULL COMMENT '(DC2Type:array)',
  `credentials_expired` tinyint(1) NOT NULL,
  `credentials_expire_at` datetime DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `lng` double NOT NULL,
  `lat` double NOT NULL,
  `avgspeed` double NOT NULL,
  `deviceId` varchar(16) NOT NULL,
  `phoneNum` int(11) NOT NULL,
  `fbToken` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_D5428AED92FC23A8` (`username_canonical`),
  UNIQUE KEY `UNIQ_D5428AEDA0D96FBF` (`email_canonical`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Users`
--

LOCK TABLES `Users` WRITE;
/*!40000 ALTER TABLE `Users` DISABLE KEYS */;
INSERT INTO `Users` VALUES (1,'oshan','oshan','oshanrube@gmail.com','oshanrube@gmail.com',1,'sn1m7o1c400wkkgsc0488g4c044w4wc','wfsJywVFIijL+I2oRaMlDMG7Criw7QaBotSohllGrv8sbjY/83T5oC5wGLFZzQ2xojJMX6G4ofQT+AplKMBapA==','2012-02-19 08:55:02',0,0,NULL,NULL,NULL,'a:0:{}',0,NULL,'Oshan Rubesinghe',80.079,6.576,60,'d4b4dab12fcaecdb',776566978,'AAADWwOa7ZB8EBAGul5ZBvOti67wBmnqO0nt0mrCRkAambNw16tH6iZAx7x0ue0gnghAszZC1pNASiT3r5mXuU98LxJwhfzhM8oMaJSqD3ST18Fp0deTS'),(2,'root','root','root@iva.com','root@iva.com',1,'pirbvxe7llc8w0woo4wgw0kogkcccws','q96JCjnV2pHEagrsTbOcpC6o5Pggc6gDq3VRw8FF7nVjaZ5eDGbfttwd5aGKZUsG+j6S5UoclK/1AsPv1z2ENA==','2012-02-18 07:42:54',0,0,NULL,'31726ecle2m848k40swgogg0s8gcg4wssw84wgsok40800o0sw',NULL,'a:1:{i:0;s:16:\"ROLE_SUPER_ADMIN\";}',0,NULL,'',0,0,0,'',0,'0');
/*!40000 ALTER TABLE `Users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `WCondition`
--

DROP TABLE IF EXISTS `WCondition`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `WCondition` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `criticality` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `WCondition`
--

LOCK TABLES `WCondition` WRITE;
/*!40000 ALTER TABLE `WCondition` DISABLE KEYS */;
INSERT INTO `WCondition` VALUES (14,'Cloudy','http://www.google.com/ig/images/weather/cloudy.gif',1),(15,'Chance of Storm','http://www.google.com/ig/images/weather/chance_of_storm.gif',1.02),(16,'Mostly Sunny','http://www.google.com/ig/images/weather/mostly_sunny.gif',1),(17,'Clear','http://www.google.com/ig/images/weather/sunny.gif',1);
/*!40000 ALTER TABLE `WCondition` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Weather`
--

DROP TABLE IF EXISTS `Weather`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Weather` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `condition_id` int(11) NOT NULL,
  `datetime` int(11) NOT NULL,
  `location` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_836DEAF2887793B6` (`condition_id`),
  CONSTRAINT `FK_836DEAF2887793B6` FOREIGN KEY (`condition_id`) REFERENCES `WCondition` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Weather`
--

LOCK TABLES `Weather` WRITE;
/*!40000 ALTER TABLE `Weather` DISABLE KEYS */;
INSERT INTO `Weather` VALUES (21,14,1328207400,'Colombo'),(22,15,1328293800,'Colombo'),(23,15,1328380200,'Colombo'),(24,16,1328466600,'Colombo'),(25,15,1328553000,'Colombo'),(26,15,1328639400,'Colombo'),(27,15,1328725800,'Colombo'),(28,15,1328812200,'Colombo'),(29,15,1328898600,'Colombo'),(30,17,1328985000,'Colombo'),(31,17,1329071400,'Colombo'),(32,17,1329157800,'Colombo'),(33,16,1329244200,'Colombo'),(34,15,1329330600,'Colombo');
/*!40000 ALTER TABLE `Weather` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2012-02-19 19:15:57
