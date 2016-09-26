-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 30, 2014 at 02:02 AM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `seminarp_cms_seminar_penelitian`
--

-- --------------------------------------------------------

--
-- Table structure for table `cms_abstrak`
--

CREATE TABLE IF NOT EXISTS `cms_abstrak` (
  `id_abstrak` char(5) NOT NULL DEFAULT '',
  `tgl_upload_abstrak` date DEFAULT NULL,
  `judul` varchar(500) DEFAULT NULL,
  `abstrak` text,
  `keyword` varchar(150) DEFAULT NULL,
  `id_pengguna` int(11) NOT NULL DEFAULT '0',
  `id_bidang_kajian` int(11) DEFAULT NULL,
  `status_review_abstrak` enum('1','2') DEFAULT '1',
  `status_penerimaan_abstrak` enum('1','2','3') DEFAULT '3',
  `kode_aktif` enum('0','1') DEFAULT '0',
  PRIMARY KEY (`id_abstrak`,`id_pengguna`),
  KEY `id_bidang_kajian` (`id_bidang_kajian`),
  KEY `id_status_review` (`status_review_abstrak`),
  KEY `id_status_penerimaan` (`status_penerimaan_abstrak`),
  KEY `id_pengguna` (`id_pengguna`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cms_abstrak`
--

INSERT INTO `cms_abstrak` (`id_abstrak`, `tgl_upload_abstrak`, `judul`, `abstrak`, `keyword`, `id_pengguna`, `id_bidang_kajian`, `status_review_abstrak`, `status_penerimaan_abstrak`, `kode_aktif`) VALUES
('A0001', '2014-05-24', 'Impact of Enterprise Resource Planning (ERP) On Employee Performance', '<p style="text-align: justify;">Enterprise Resource Planning (ERP) is an integrated software for your business or organization that has an important role in increasing the efficiency and effectiveness of the company. ERP can integrate most of the processes that exist in the company so as to provide the necessary information for the company&#39;s operations in realtime. Integration of the results of the implementation of ERP can assist employees in terms<br />\r\nof dependency and coordination with other employees. This research studied the effect of ERP on addiction, coordination and work performance of the employees. The method used in this study is a quantitative method of Structural Equation Modeling (SEM). Respondents study were 204 employees of PT. PLN (Persero) using SAP ERP on the job. ERP results showed that positive and significant to dependency and employee<br />\r\nperformance PT. PLN (Persero), but no effect on the coordination among employees. Then, the dependence among employees can have a positive and significant impact on the coordination that exists, but interdependence has a negative influence on the performance of the employee. Also note that the coordination among the employees a significant effect on the work performance of the employee.</p>\r\n', 'ERP, interdependence, coordination, work performance, structural equation modeling', 5, 3, '2', '2', '1'),
('A0002', '2014-05-24', 'WEB BASED UMRAH SERVICE INFORMATION SYSTEM DESIGN(CASE STUDY : PT. MAKDIS TOUR)', '<p>PT. Makdis Tour is a service company that operates on Umrah travel and Major Pilgrimage service. PT. Makdis Tour guides Umrah congregations from the registration process until they finish their pilgrimage. The aim of this research was to provide easy access for the congregations in gaining registration information, registrating process, and to confirm the payment. This research also provides easy access for PT. Makdis Tour in<br />\r\nprocessing Umrah congregation data. Research method used is Structured System Approach and the system development used is prototype. Supporting softwares are Macromedia Dreamweaver, XAMPP (Web Server), and Web Browser Google Chrome, with web programming languages PHP, CSS, Javascript, and MySQL database. The outcome of this research is web based umrah service information system. With this information system, congregations can access newest information on umrah regristation, online regristation, confirm the payment, and provides easy access for PT. Makdis Tour in processing congregation data to increase service quality for the congregations.</p>\r\n', 'Keywords: information system, service, umrah, web', 6, 3, '2', '1', '1'),
('A0003', '2014-05-24', 'Assessment on the Implementation of SAP Asset Management (A Case Study at PT. X)', '<p>A good and efficient implementation of an enterprise asset management system may improve asset data management effectiveness and reduce<br />\r\ndifficulties in maintaining an enterprise-scale asset data. PT. X implemented the SAP Enterprise Asset Management (EAM) module to improve the -scale asset data, as it offers end-to-end solution for an enterprise. This study observed the implementation of SAP EAM at PT. X, and assessed the effectiveness, efficiency, and satisfaction on the performance of the system. The assessment was performed by a paper-based survey on the employees who operates the SAP EAM module. Twenty six anonymous responses were collected and analyzed with descriptive statistics. The results show that on the 1 to 5 scale, the SAP AM module implementation effectiveness was rated at 4.28, efficiency was rated<br />\r\nat 4.36, and the satisfaction on the system performance was rated at 4.26. This confirmed that the SAP AM module implementation facilitated a<br />\r\nbetter asset management data and business processes at PT. X.</p>\r\n', 'SAP Asset Management, implementation, effectiveness, efficiency, satisfaction', 17, 3, '2', '2', '1'),
('A0004', '2014-05-24', 'WEB BASED INCOMING GOODS AND STUFF OUT INFORMATION SYSTEM AT SUGARINDO STORE GARUT', '<p style="text-align: justify;">Sugarindo Stores is a company engaged in selling high-end goods from raw material leather. It has some part in the organization, one of which is part of the sales and purchase. The sales charge of the sale transaction, data recording sales transactions, and report daily sales transactions. The Problems that occur in the sale is the process of selling and processing sales transaction data is still done manually, which is the process of recording the transaction data in the memorandum of sale and registration statements in the sales ledger. This has led to a number of problems in the management of the sales transaction data such as the memorandum of sales lost archives, and the difficulty of finding the file in the manufacturing sales report, sales miscalculation because they still use the calculator, as well as the sales and reservations must be made<br />\r\ndirectly at the store resulted in a lack of sales productivity. Based on the above, he built a webbased information system sales, this application was built to help the process contained in the sale such as processing sales transaction data, calculation of sales of goods, sales processing, customer data management, data management of goods, and processing sales reports, the purpose of making this application that the user or the customer can make the sales transaction process in any network connected to the Internet. Research methodology in Stores Sugarindo using the structured approach for the system approach method that is consist of Data Flow Diagram and Entity Relationship Diagram, as for the system development method used in this research is the paradigm of a prototype model. Based on the implementation and tests performed<br />\r\non the user, with the construction of a web-based information system Sales, it can assist the user in the data processing, which can lead to information quickly and simplify the processing of data in each section that are involved in the sale of information systems.</p>\r\n', 'Information Systems, Web-based sales systems, e-commerce', 18, 2, '2', '2', '1'),
('A0005', '2014-05-24', 'DESIGNING OF IT STRATEGY MAP IN PUSAT SUMBER DAYA GEOLOGI BANDUNG', '<p style="text-align: justify;">This paper will discuss several issues related to the design of the IT Strategy Map by using the method of John Ward-Peppard (2002) which includes the analysis of the external business environment, internal business analysis, IT Internal environment analysis and analysis of the external IT environment to determine business strategy of the agency concerned, as well as using IT Balanced Scorecard approach to determine IT management strategy. The result showed that the five strategies, Strategies to Improve Quality of Human Resources (HR), Strategies to Increase Reliability of Operational, Strategic Use of Information Technology services, Strategies to Increase Cooperation and Creating alternative financing strategies. To ease the translation of such strategies on the area and the whole perspective of IT Balancescorecard target the information technology systems of these strategies can be formulated in the form of maps and mapped information technology strategies are aligned and balanced, so as to support the achievement of the PusatSumberDayaGeologi.</p>\r\n', 'Information Technology, Strategic Planning, SWOT Analysis, IT Balance Scorecard, IT Strategy Map', 19, 4, '2', '2', '1'),
('A0006', '2014-05-31', 'Determination of Development Priority through E-Government Applications in the City of Serang', '<p>It is necessary to develop priorities. A rational budget allocation should be based on the principle of value for money. The research question is how make determination of development priority trough e-Government applications ? The methods used in the preparation of priority development activities are descriptive exploratory. Sispro Serang is an information system that utilizes information and communication technology to facilitate setting priorities of development activities in the city of Serang. The initial assessment starts from phase to determine criteria for assessment activities. Assessment components used in the assessment stage are: (1) The Results of Community Satisfaction Survey (SKM), (2) The Results of Development Planning Meeting (Musrenbang), (3) The Summary of the reasoning of the Board, (4) The Relationship to the Human Development Index (HDI), (5) The Compliance with the Medium Term Development Plan (RPJMD). The conclusion reached is setting priorities in the development activity of Serang should be based on the aspirations and participation of the people.</p>\r\n', 'Priority, Scale, Development, Aplication, e-Government', 22, 5, '2', '2', '1'),
('A0007', '2014-06-02', 'DESIGNING OF HEALTH SERVICES INFORMATION SYSTEM', '<p style="text-align: justify;">Providing health services to community is one of&nbsp;the goals of the BKPM Bandung&nbsp;polyclinic. To gain its goals that polyclinic want to&nbsp;build an information System that can optimize the&nbsp;services. Health Services Information System aims to&nbsp;integrate the data contained in each of work, so that&nbsp;the system can quickly provide information needed.&nbsp;In making this system will use a structured approach&nbsp;and will use ER-d and DFD notations as modeling&nbsp;tools. Implementation of this system is expected to&nbsp;meet one of the characteristics of the system, which&nbsp;provides quality information.</p>\r\n', 'BKPM; Medical Record; Health Services; Clinic Prototype;', 26, 11, '2', '1', '1'),
('A0008', '2014-06-10', 'NETWORK BASED LANDING SYSTEM: AN ALTERNATIVE OF LANDING SYSTEM', '<p style="text-align: justify;">As information technology particularly network convergence into IP (Internet Protocol) network, new kinds of application emerge. Applications cover a wide range of area from education, health, government, etc. Transportations are not excluded. Information technology could provide services related to aircraft positions, flight condition, emergency status, including information for landing system. Network based landing system is a new concept of providing information to airmen on how an aircraft correlated within the designated or nearby airport. This covers spatial data of certain airports; their weather condition, runway length, airport capabilities, and pathways for en route and landing. These information are also paired with GPS (Global Positioning System) for data crosschecking. Data from GPS are correlated with spatial data thus giving knowledge such as how an aircraft on final approach satisfies minimum glide slope. For the first step, we establish a spatial database in a form of geo-map for case study. Further development will be expanded into database layers related to location based service (LBS) for aerial services.</p>\r\n', 'IP Network, Geo-map Database, Database Layers, Location Based Service (LBS).', 42, 14, '2', '2', '1'),
('A0009', '2014-06-10', 'IMPLEMENTATION OF LINUX ZENTYAL AS A VOIP SERVER FOR WEB BASED CONFERENCE ROOM APPLICATION', '<p style="text-align: justify;">VoIP (Voice over Internet Protocol) is a technology that uses an IP network to provide voice communications electronically and in real-time. In implementation, VoIP can be used for a conference room that integrated with slides, video, desktop sharing and voice. One of open source web based conference room that ready to use is Bigbluebutton. This application requires a VoIP module that function as a VoIP service provider, and will be connected with the client though gateway that have compatibility with the conference room. Linux Zentyal operating system has a built-in module for this purpose. To test of availability of VoIP services performed by packet-capture. The functionality test of RTMP is performed by conducting conferences between several clients. The outcomes is showed that the greatest load of the system is when the module initialization. The testing result of VoIP applications on Linux Zentyalis also showed that delay happens to play a role in VoIP, because voice is sent must be in accordance with the delivery time, in order to have a conference that has not a big delay that will cause drop client.</p>\r\n', 'VoIP, Linux Zentyal, RTMP', 41, 14, '2', '1', '1'),
('A0010', '2014-06-10', 'Students Loyalty in terms of Institutions Image and Trust (Survey on Students of DIII Programs at Private University in Bandung City)', '<p>Development of needs to higher education will eventually open the opportunities for private sector to participate in the education business. In the<br />\r\nmarketing world, the establishment of a positive corporate image will help the company in marketing activity, because the conditions of competition is very tight, each company will try to put itself the best on in order to be trusted to fulfill their needs and wants. Many state universities open DIII programs which makes the image of private universities decline. People trust DIII Programs at the State University more compare to DIII Programs at Private University. According to the students, the institution image will Influence the assessment of students to be loyal to their college. trust will determine their assessment of the overall value they receive. Consumers who have trust will also have a loyalty. The purpose of this research is to gain the result of study description about the Institution image, Trust and loyalty of DIII programs at college in Bandung; examine The Influence of Institution Image and Trust on Loyalty (Survey on Students of DIII programs at Private University in Bandung).<br />\r\nType of research which used was descriptive and verificative. Data collection technique was the study of literature and field studies. Field studies used observation, interviews and questionnaires. Samples were taken 117 students (respondents) of DIII in Bandung. Samples withdrawal technique used Systematic Random Sampling. Effects models analyzed using Structural Equation Models. The results showed the influence of Institution image and Trust on (Survey on Students of DIII Programs at Private University in Bandung).</p>\r\n', 'Institution image, trust, students, loyalty', 28, 22, '1', '3', '0'),
('A0011', '2014-06-10', 'DESIGN OF LAPAKMOBILE.COM BUSINESS APLICATION AT PASAR TRADISIONAL SIMPANG BANDUNG USING PHP AND MYSQL BASES OF WEB', '<p style="text-align: justify;">Business activities of buying and selling on PD Pasar Tradisional Simpang Dago Bandung is the focus of this research. The non documented evidence, the absence of product promotions, and the improper accounting records are the object of this report. Based on these problems, the writer takes the title Perancangan Aplikasi Bisnis Lapakmobile.com Pada Pasar Tradisional Simpang Bandung Menggunakan PHP dan MySQL Berbasis Web The goal of this research is to create an integrated Pasar Tradisional Simpang Dago based online information system. The research method used is descriptive, surveys, and explanatory. The study design used is primary data and secondary research. This type of research is the academic study. The type of data used are quantitative and qualitative data. The data collection techniques used are interviews, observation and literature research. The systems development method used is object-oriented method. The system development model used is Rapid Aplication Development (RAD). The writer proposes to design a web-based online application with the name lapakmobile.com, comprising the features for data processing purchases and sales that are in accordance with accounting standard</p>\r\n', 'Designing, aplication, business.', 36, 2, '1', '3', '1'),
('A0012', '2014-06-10', 'Design and Implementation Mobile Web Applications for Monitoring and Assistance to Support Poverty Reduction and Empowerment Program', '<p style="text-align: justify;">Poverty reduction, is one of the eight target Millennium Development Goals (MDGs), which was initiated by UN member states. In fact, poverty reduction could be entrances to solve another various problems of Patient Problem of Social Prosperity (PMKS). Therefore, the role of Information and Communication Technology (ICT) as a means of support in addressing fundamental problems in the MDGs targets become increasingly<br />\r\ncritical. The focus of this research is to design a mobile web application for monitoring and mentoring of society empowerment program in the form of Joint Business Group (KUBE). The design of user interface display and the prototype application is presented to the user to obtain feedback.</p>\r\n', 'society empowerment, monitoring, mobile web application, KUBE.', 37, 23, '1', '3', '0'),
('A0013', '2014-06-10', 'SCENARIOS DEVELOPMENT TO INCREASE PRICE STABILITY AND INVENTORIES OF SUGAR INDUSTRY USING SYSTEM DYNAMICS APPROACH', '<p>Sugar is one of the strategic commodities<br />\r\nowned by Indonesia as a tropical country, sugar has<br />\r\nbeen produced in 110 countries, such as Brazil,<br />\r\nIndia, Australia, Thailand, China, and Cuba. The<br />\r\nsugar production in PT.Perkebunan Nusantara (PN)<br />\r\nIX reached 58.000 quintals until this month and<br />\r\nexpected to increase to 878.000 quintals at the end of<br />\r\nthe year. PTPN production continues to<br />\r\ndecrease.This is due to machine condition that<br />\r\ngetting old. furthermore, sugarcane land area<br />\r\ndecline, which resulted in the supply of raw<br />\r\nmaterials decline and sugar prices getting out of<br />\r\ncontrol. Currently, the price of sugar handed over to<br />\r\nmarket mechanisms, market mechanism occurs when<br />\r\nthe sugar supply is higher than demand then the<br />\r\nprices tend to decline, but when the sugar demand is<br />\r\nhigher than supply then price tend to an increase.<br />\r\nWith the above issues, the system of national sugar<br />\r\nindustry has a dynamic variable and flexible.<br />\r\nSystem behavior changes with time, the<br />\r\ndynamics system which large and complex,<br />\r\navailability feedback to the system and the feedback<br />\r\nlatest information about the state of system so that<br />\r\nproduce a decision. With the behavior of the system<br />\r\nchanging and dynamic, this paper use System<br />\r\nDynamic approach to solve complex problems by<br />\r\ndetermining the scenarios sugar policy.<br />\r\nThis paper presents a conceptual<br />\r\nframework for scenarios development to increase<br />\r\nstability price and inventories of sugar industry<br />\r\nusing system dynamics modeling approach, and<br />\r\nadding bufferstock management into system<br />\r\ndynamics model.</p>\r\n', 'Buffer Stock Management, Stability Price And Inventories, Scenarios Policy In Sugar Industry, System Dynamics Approach.', 20, 4, '1', '3', '0'),
('A0014', '2014-06-10', 'PROSPECT OF BANDUNG CITY AS THE CENTER OF INFORMATION AND COMMUNICATION TECHNOLOGY (ICT) IN FACING ASEAN COMMUNITY 2015', '<p>This paper is motivated by the revolution and the<br />\r\ndevelopment of Information and Communication<br />\r\nTechnology (ICT), which indirectly also accelerate the<br />\r\nonset of globalization. At the regional scale, at the<br />\r\nAssociation of South East Asian Nations (ASEAN) in the<br />\r\nframework of the ASEAN Community 2015, has<br />\r\nestablished the e-ASEAN Framework Agreement in order<br />\r\nto exploit the opportunities created by the revolution and<br />\r\nthe development of ICT. Indonesia, as the ASEAN<br />\r\ncountries, directly or indirectly, of course, will get the<br />\r\neffect of the e-ASEAN Framework Agreement which was<br />\r\napproved on 24 November 2000. Bandung as one of the<br />\r\nIndonesian city of education in ICT-based course plays<br />\r\nan important role in meeting this challenge. This paper<br />\r\naims to look, learn, explain and analyze the prospects for<br />\r\nthe Bandung as the ICT hub in the ASEAN Community<br />\r\n2015. So as to encourage Bandung as the Center of<br />\r\nInformation and Communication Technology (ICT) in<br />\r\nfacing ASEAN Community 2015.</p>\r\n', 'T, ASEAN Community, Bandung', 23, 1, '1', '3', '0'),
('A0015', '2014-06-10', 'Smart Home To Enhance A Better Living', '<p>&#39;Smart home&#39; is an alternative term for an<br />\r\nintelligent residential building, or an intelligent<br />\r\nhome. The development of smart home systems focus<br />\r\non how the home and its related technologies,<br />\r\nproducts, and services should evolve to best meet the<br />\r\nopportunities and challenges of the future. A smart<br />\r\nHome is one that achieves significant energy savings<br />\r\nby taking advantage of improved technology and<br />\r\nmaterials in terms of structure, appliances, electrical<br />\r\nsystems, plumbing, and HVACR<br />\r\nSmart home can be related to the definition of<br />\r\nGreen building / green Design , a structure and<br />\r\nusing process that is environmentally responsible<br />\r\nand resource-efficient throughout a building&#39;s lifecycle:<br />\r\nfrom siting to design, construction, operation,<br />\r\nmaintenance, renovation, and demolition.<br />\r\nhealthy<br />\r\nsmart home related to term of healthy homeand<br />\r\nsmart building. The purpose of this disscuss is<br />\r\nclarify the assosciation between<br />\r\nand smart building<br />\r\nfor residential facility.</p>\r\n', 'smart home, smart building, healthy home', 39, 10, '1', '3', '0'),
('A0016', '2014-06-10', 'LAND REGISTRATION IN INFORMATION TECHNOLOGY PRESPECTIVE BASED ON AGRARIAN LAW IN INDONESIA', '<p>Land Registration is a series of activity which is<br />\r\ncarried out by the government continuously and<br />\r\nregularly. It includes collecting, managing,<br />\r\nadministrating and presenting as well as maintaining<br />\r\nphysical data and juridical data in the form of map<br />\r\nand list, concerns with the land areas and it is ended<br />\r\nby giving the land right certificate. Land<br />\r\nRegistration is to aim to give a guarantee of<br />\r\ncertainty for the land right object included the<br />\r\nborder and the width of the land. One of the<br />\r\nproblems faced in land registration often appears<br />\r\ndouble certificates caused by having not been<br />\r\nmapped the lands completely. Besides that, it can<br />\r\ntake place because the system of land registration<br />\r\nwhich has negative system tends towards positive. To<br />\r\napply the problem, the writer tries to approach the<br />\r\nuse of information technology. The research is a<br />\r\nnormative research with approaching a historical<br />\r\nlegal and historical legal and futuristic legal<br />\r\nmethods.<br />\r\nThe research used a qualitative analysis to the<br />\r\nsecond data which was taken from literature study<br />\r\nfrom library. From the research, it was found that in<br />\r\nthe connection with public service in land<br />\r\nregistration, information technology is needed very<br />\r\nmuch to fasten the service of public and give an<br />\r\naccurate result. So that in the future, it needs to<br />\r\nsynergize the process of land registration based on<br />\r\ninformation technology, to carry out infrastructure<br />\r\nthat can support information technology, and it<br />\r\nneeds to implement the on line land registration<br />\r\ngradually, so that in the end it can help or support<br />\r\nthe fastening of land registration in all areas of<br />\r\nIndonesia.</p>\r\n', 'land registration, information technology, and basic agrarian law (UUPA)', 25, 3, '1', '3', '1'),
('A0017', '2014-06-10', 'THE INFLUENCE OF WORKING CAPITAL AND LIQUIDITY TO PROFITABILITY IN THE TELECOMMUNICATIONS COMPANY LISTED ON THE INDONESIA STOCK EXCHANGED PERIOD 2007 - 2012', '<p>The Problems that occurred in<br />\r\nTelecommunication Company in Indonesia is the<br />\r\nmore fierce competition faced by many companies to<br />\r\nplay in the sector. Facing competition that strict,<br />\r\nthen each company needed a fund in running all<br />\r\nactivities. The Fund that is used this is what is<br />\r\ncalled working capital. In defining number of<br />\r\nworking capital, the company will be brought before<br />\r\nthe problem of exchanges between factors liquidity<br />\r\nand profitability.<br />\r\nThe aim of the research is to know:<br />\r\nNowadays, working capital liquidity and<br />\r\nprofitability, the relationship between working<br />\r\ncapital with liquidity and influence working capital<br />\r\nand liquidity to profitability simultaneously and<br />\r\npartial.<br />\r\nResearch method is used in a holistic<br />\r\napproach method descriptive terms of quantity.<br />\r\nAnalysis methods will be done with technical path<br />\r\nanalysis, correlation, and the drag coefficient<br />\r\ndetermination. Hypothesis using tests t and trial F,<br />\r\nsignificant level 5 percent.<br />\r\nThe analysis result statistics conclusion is a<br />\r\nlevel relationship with working capital liquidity is<br />\r\nstrong enough, in the direction and<br />\r\nsignificantly.Working capital and liquidity<br />\r\nsimultaneously significantly affect to profitability.<br />\r\nAny partial solution only liquidity significantly affect<br />\r\nto profitability and working capital did not<br />\r\nsignificantly affect to profitability.</p>\r\n', 'Working Capital, Liquidity and Profitability.', 31, 1, '1', '3', '0'),
('A0018', '2014-06-10', 'The Effect of Conflict and Stress At Work Towards Employees Performance In PT. Bayer Indonesia-Bayer CropScience Of West', '<p>Conflict will cause the stress that occurs in the life<br />\r\nofthe company, if not taken seriously will cause<br />\r\nsignificant impactto the company&#39;s business goal<br />\r\nachievement. This study uses conflict, job stress and<br />\r\nemployee performance. Therefore, this research aims<br />\r\nto identify and analyze the effect of conflict and work<br />\r\nstress on employee performance at PT. Indonesian<br />\r\nBayer-Bayer Crop Science of West Java. Statistical<br />\r\nmethods in conducting this study is inferential<br />\r\nstatistics, as for the type of research use<br />\r\ndisdescriptive research verification. Analysis too<br />\r\nlsused in this study using path analysis. Data<br />\r\ncollected through observation, interviews, and the<br />\r\ndistribution of question naires. The results showed<br />\r\nthat the effect of the conflicton the job stress PT.<br />\r\nIndonesian Bayer-Bayer Crop Science of West Java.<br />\r\nConflict partially affect the performance of<br />\r\nemployees at PT. Indonesian Bayer-Bayer Crop<br />\r\nScience of West Java. Partial effect of work stress on<br />\r\nemployee performance at PT. Indonesian Bayer-<br />\r\nBayer Crop Science of West Java. Conflict and Job<br />\r\nStress jointly affect the performance of the employees<br />\r\nof PT. Indonesian Bayer-Bayer Crop Science of West<br />\r\nJava.</p>\r\n', 'Conflict, Job Stress, and Employee Performance.', 32, 9, '1', '3', '0'),
('A0019', '2014-06-10', 'INFORMATION SYSTEM OF PROPERTY ADVERTISING USING ANDROID BASED', '<p>Along with mobile technology that is getting<br />\r\nactive, certain media is needed to fulfill the necessity<br />\r\nof fast, exact, and acurate information. One of media<br />\r\nthat can be used for fulfilling the information needed<br />\r\nis a portable device. Most of mobile device can not<br />\r\nbe separated with operating system used. One of the<br />\r\npopular operating system now is android. Passion IT<br />\r\nis modem consultant company engaged in the field of<br />\r\ninformation technology. In the development, Passion<br />\r\nIT is as growing as information technology. The<br />\r\nmajority of users who look at property site through<br />\r\nwebsite felt that the site has not fullfilled their needs<br />\r\nyet since they can not access property site in<br />\r\neverywhere. Besides, they also felt that the property<br />\r\nselling through website is so hard to open on mobile<br />\r\nphone considering to so many contents that have to<br />\r\nbe opened. Thus, the writers create an aplication<br />\r\nthat can search property information including<br />\r\nproperty new launching, property news and location.<br />\r\nTo create the aplication of property information<br />\r\nsearching, new release property, property news and<br />\r\nlocation in this research, the writers use descriptive<br />\r\nmethod and action method. Descriptive method is<br />\r\nused by illustrating the fact in object research while<br />\r\naction method is used by observing directly to the<br />\r\nfield of object. For system development, the writers<br />\r\nuse prototype method by creating aplication mockup.<br />\r\nBesides, the writers use UML as a tool to analyze<br />\r\nand create aplication by using seven diagram.<br />\r\nThe aplication in this research can provide<br />\r\nproperty information, property new launching,<br />\r\nproperty news and location more effective and more<br />\r\nefficient. Moreover, this aplication can give<br />\r\ninformation fastly, exactly, and accurately.</p>\r\n', 'Mobile Aplication, Property Advertising, Android', 21, 3, '1', '3', '1'),
('A0020', '2014-06-10', 'DESIGN OF ACTIVITY STATEMENT ACCOUNTING INFORMATION SYSTEM BADAN LAYANAN UMUM BALAI BESAR BAHAN DAN BARANG TEKNIK (B4T) USING MICROSOFT VISUAL BASIC 2005 AND MYSQL BASED CLIENT SERVER', '<p>Activity Report in BLU-B4T is the focus of this<br />\r\nresearch. Recording the activity report in the<br />\r\ncompany is not accordance with the accounting<br />\r\nstandards, and still simple, using Microsoft Excel.<br />\r\nBased on these problems, the authors take the title<br />\r\nDesign Of Activity Statment Accounting<br />\r\nInformation System Badan Layanan Umum Balai<br />\r\nBesar Bahan Dan Barang Teknik (B4T) Using<br />\r\nMicrosoft Visual Basic 2005 And MySql Based<br />\r\nThe author purpose in this research is to assist<br />\r\ncompanies in making the statements that have been<br />\r\nintegrated by the system in order tomore effective<br />\r\nlyand efficiently. The method used is descriptive.<br />\r\nData collection techniques that I use are included in<br />\r\nthe data collection techniques interview, observation,<br />\r\nand literature are designed based on the design<br />\r\nframework of primary data/secondary using a type of<br />\r\nbasic research. Model of the development of the<br />\r\nsystem that I use is a waterfall. Accounting<br />\r\ninformation system design used is the context<br />\r\ndiagram, data flow diagram, data dictionary,<br />\r\nflowchart, normalization and ERD.<br />\r\nApplication of Accounting Information System<br />\r\nDesign Statement is expected to process the<br />\r\ntransaction nicely data, have been computerized. Out<br />\r\nput of the program include: General Journal,<br />\r\nGeneral Ledger and Statement of Activities.</p>\r\n', 'Design, Application, Activity Report.', 35, 3, '2', '2', '1');

-- --------------------------------------------------------

--
-- Table structure for table `cms_admin`
--

CREATE TABLE IF NOT EXISTS `cms_admin` (
  `id_pengguna` int(11) NOT NULL,
  `level_admin` enum('1','2') DEFAULT '2',
  PRIMARY KEY (`id_pengguna`),
  KEY `id_level_admin` (`level_admin`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cms_admin`
--

INSERT INTO `cms_admin` (`id_pengguna`, `level_admin`) VALUES
(1, '1'),
(2, '2');

-- --------------------------------------------------------

--
-- Table structure for table `cms_bidang_kajian`
--

CREATE TABLE IF NOT EXISTS `cms_bidang_kajian` (
  `id_bidang_kajian` int(11) NOT NULL AUTO_INCREMENT,
  `nama_bidang_kajian` varchar(100) DEFAULT NULL,
  `kode_aktif` enum('0','1') NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_bidang_kajian`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=35 ;

--
-- Dumping data for table `cms_bidang_kajian`
--

INSERT INTO `cms_bidang_kajian` (`id_bidang_kajian`, `nama_bidang_kajian`, `kode_aktif`) VALUES
(1, 'Technopreneur', '1'),
(2, 'E-Commerce', '1'),
(3, 'Information Systems', '1'),
(4, 'Strategic Information System', '1'),
(5, 'E-Government', '1'),
(6, 'Database Management', '1'),
(7, 'Semantic', '1'),
(8, 'Game Development', '1'),
(9, 'Industrial Engineering', '1'),
(10, 'Intelligent System', '1'),
(11, 'Expert System', '1'),
(12, 'Operating System', '1'),
(13, 'Bioinformatics', '1'),
(14, 'Computer Network', '1'),
(15, 'Computer Vision', '1'),
(16, 'Neural Network', '1'),
(17, 'Animation', '1'),
(18, 'Cloud Computing', '1'),
(19, 'Mobile Application', '1'),
(20, 'Geographic Information System', '1'),
(21, 'Risk Management', '1'),
(22, 'Customer Relationship Management', '1'),
(23, 'Web Application', '1'),
(24, 'E-Learning', '1'),
(25, 'Multimedia Apllication', '1'),
(26, 'Cluster Computing', '1'),
(27, 'Data Mining', '1'),
(28, 'Software Engineering', '1'),
(29, 'Data Center', '1'),
(30, 'Network and Security', '1'),
(31, 'Human Computer Interaction', '1'),
(32, 'Decision Support System', '1'),
(33, 'Paralel Processing', '1'),
(34, 'Computer Graphic', '1');

-- --------------------------------------------------------

--
-- Table structure for table `cms_brosur_template`
--

CREATE TABLE IF NOT EXISTS `cms_brosur_template` (
  `id_brosur_template` int(11) NOT NULL AUTO_INCREMENT,
  `nama_dokumen` varchar(100) DEFAULT NULL,
  `tipe_file` varchar(10) DEFAULT NULL,
  `id_pengguna` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_brosur_template`),
  KEY `id_pengguna` (`id_pengguna`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `cms_brosur_template`
--

INSERT INTO `cms_brosur_template` (`id_brosur_template`, `nama_dokumen`, `tipe_file`, `id_pengguna`) VALUES
(1, 'brosurpdf', 'pdf', NULL),
(2, 'template_paper', 'docx', NULL),
(3, '1', 'jpg', NULL),
(4, '2', 'jpg', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cms_bulan`
--

CREATE TABLE IF NOT EXISTS `cms_bulan` (
  `id_bulan` int(11) NOT NULL AUTO_INCREMENT,
  `nama_bulan` varchar(5) DEFAULT NULL,
  `kode_aktif` enum('0','1') DEFAULT NULL,
  `id_pengguna` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_bulan`),
  KEY `id_pengguna` (`id_pengguna`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `cms_bulan`
--

INSERT INTO `cms_bulan` (`id_bulan`, `nama_bulan`, `kode_aktif`, `id_pengguna`) VALUES
(1, 'I', '0', NULL),
(2, 'II', '0', NULL),
(3, 'III', '0', 1),
(4, 'IV', '0', 1),
(5, 'V', '0', 1),
(6, 'VI', '1', 1),
(7, 'VII', '0', 1),
(8, 'VIII', '0', NULL),
(9, 'IX', '0', NULL),
(10, 'X', '0', NULL),
(11, 'XI', '0', NULL),
(12, 'XII', '0', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cms_footer`
--

CREATE TABLE IF NOT EXISTS `cms_footer` (
  `id_footer` int(11) NOT NULL AUTO_INCREMENT,
  `copyright` varchar(50) DEFAULT NULL,
  `id_tahun` int(11) DEFAULT NULL,
  `id_pengguna` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_footer`),
  KEY `id_tahun` (`id_tahun`),
  KEY `id_pengguna` (`id_pengguna`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `cms_footer`
--

INSERT INTO `cms_footer` (`id_footer`, `copyright`, `id_tahun`, `id_pengguna`) VALUES
(1, 'ferawati hartanti pratiwi', 1, 1),
(2, 'ferawati hartanti pratiwi', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `cms_google_maps`
--

CREATE TABLE IF NOT EXISTS `cms_google_maps` (
  `id_google_maps` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(60) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `lat` double NOT NULL,
  `lon` double NOT NULL,
  `tipe` varchar(30) NOT NULL,
  `id_pengguna` int(11) DEFAULT NULL,
  `kode_aktif` enum('0','1') NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_google_maps`),
  KEY `id_pengguna` (`id_pengguna`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `cms_google_maps`
--

INSERT INTO `cms_google_maps` (`id_google_maps`, `nama`, `alamat`, `lat`, `lon`, `tipe`, `id_pengguna`, `kode_aktif`) VALUES
(1, 'UNIKOM', 'JL. Dipati Ukur', -6.886773, 107.615392, 'University', 1, '1'),
(2, 'royal dago', '-', -6.885868, 107.613182, 'Hotel', 1, '0'),
(3, 'Mie Semur Pamanahrasa', '-', -6.887754, 107.615426, 'Restaurant', 1, '0'),
(4, 'Bandung Indah Plaza', '-', -6.908731, 107.610884, 'Mall', 1, '0');

-- --------------------------------------------------------

--
-- Table structure for table `cms_header`
--

CREATE TABLE IF NOT EXISTS `cms_header` (
  `id_header` int(11) NOT NULL AUTO_INCREMENT,
  `tema_acara` varchar(100) DEFAULT NULL,
  `nama_acara` varchar(100) DEFAULT NULL,
  `akronim` varchar(25) DEFAULT NULL,
  `tempat_acara` varchar(100) DEFAULT NULL,
  `id_tahun` int(11) DEFAULT NULL,
  `logo_satu` varchar(100) DEFAULT NULL,
  `logo_dua` varchar(100) DEFAULT NULL,
  `id_pengguna` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_header`),
  KEY `id_tahun` (`id_tahun`),
  KEY `id_pengguna` (`id_pengguna`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `cms_header`
--

INSERT INTO `cms_header` (`id_header`, `tema_acara`, `nama_acara`, `akronim`, `tempat_acara`, `id_tahun`, `logo_satu`, `logo_dua`, `id_pengguna`) VALUES
(1, 'Empowering Development Country Through Sustainable Ict', '1st INTERNATIONAL CONFERENCE ON APPLIED ICT', 'ICO-APICT', 'Computer University Of Indonesia', 1, 'logo.png', 'logo2.png', 1),
(2, 'Empowering Development Country Through Sustainable Ict', '1st INTERNATIONAL CONFERENCE ON APPLIED ICT', 'ICO-APICT', 'Computer University Of Indonesia', 2, 'logo.png', 'logo2.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `cms_jadwal`
--

CREATE TABLE IF NOT EXISTS `cms_jadwal` (
  `id_jadwal` int(11) NOT NULL AUTO_INCREMENT,
  `ruangan` int(11) NOT NULL,
  `no_ruangan` varchar(25) DEFAULT NULL,
  `id_paper` char(5) DEFAULT NULL,
  `waktu_awal` double DEFAULT NULL,
  `waktu_akhir` double DEFAULT NULL,
  PRIMARY KEY (`id_jadwal`),
  KEY `id_order_urutan` (`waktu_awal`),
  KEY `id_paper` (`id_paper`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `cms_jadwal`
--

INSERT INTO `cms_jadwal` (`id_jadwal`, `ruangan`, `no_ruangan`, `id_paper`, `waktu_awal`, `waktu_akhir`) VALUES
(1, 1, '5303', 'P0001', 9, 9.15);

-- --------------------------------------------------------

--
-- Table structure for table `cms_kuesioner`
--

CREATE TABLE IF NOT EXISTS `cms_kuesioner` (
  `id_kuesioner` int(11) NOT NULL AUTO_INCREMENT,
  `pertanyaan` varchar(200) DEFAULT NULL,
  `id_urutan_pertanyaan` int(11) DEFAULT NULL,
  `id_tahun` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_kuesioner`),
  KEY `id_urutan_pertanyaan` (`id_urutan_pertanyaan`),
  KEY `id_tahun` (`id_tahun`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `cms_kuesioner`
--

INSERT INTO `cms_kuesioner` (`id_kuesioner`, `pertanyaan`, `id_urutan_pertanyaan`, `id_tahun`) VALUES
(1, 'panitia menyebarkan informasi seminar penelitian dengan cepat', 2, 1),
(2, 'panitia memberikan format penulisan paper dengan cepat', 1, 1),
(3, 'acara berjalan tepat waktu', 3, 1),
(4, 'respon panitia terhadap peserta sangat cepat', 4, 1),
(5, 'proses review terhadap abstrak cepat', 5, 1),
(6, 'proses review terhadap paper cepat', 6, 1),
(7, 'informasi seminar penelitian dari panitia kurang akurat', 7, 1),
(8, 'panitia serius dalam melaksanakan acara seminar penelitian', 8, 1),
(9, 'acara seminar penelitian terasa menyenangkan', 9, 1),
(10, 'anda mendapatkan manfaat dengan mengikuti acara seminar penelitian', 10, 1),
(11, 'panitia menyebarkan informasi seminar penelitian dengan cepat', 4, 2),
(12, 'panitia menyampaikan format paper dengan cepat', 2, 2),
(13, 'panitia sangat serius dalam pelaksanaan kegiatan seminar penelitian', 3, 2),
(14, 'anda mendapatkan manfaat dari acara seminar penelitian', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `cms_menu`
--

CREATE TABLE IF NOT EXISTS `cms_menu` (
  `id_menu` int(11) NOT NULL AUTO_INCREMENT,
  `nama_menu` varchar(20) DEFAULT NULL,
  `link_file` varchar(100) DEFAULT NULL,
  `ext` varchar(10) DEFAULT 'php',
  `title` varchar(200) DEFAULT NULL,
  `isi` text,
  `id_order_urutan` int(11) DEFAULT NULL,
  `kode_aktif` enum('0','1') DEFAULT '0',
  `date` date DEFAULT NULL,
  `id_pengguna` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_menu`),
  KEY `id_order_urutan` (`id_order_urutan`),
  KEY `id_pengguna` (`id_pengguna`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `cms_menu`
--

INSERT INTO `cms_menu` (`id_menu`, `nama_menu`, `link_file`, `ext`, `title`, `isi`, `id_order_urutan`, `kode_aktif`, `date`, `id_pengguna`) VALUES
(1, 'home', 'home', 'php', NULL, NULL, 1, '1', '2014-05-15', 1),
(2, 'call for paper', 'call_for_papers', 'php', NULL, NULL, 2, '1', '2014-05-15', 1),
(3, 'committee', 'committee', 'php', NULL, NULL, 3, '1', NULL, NULL),
(4, 'important date', 'important_date', 'php', NULL, NULL, 4, '1', '2014-05-15', 1),
(5, 'venue', 'venue', 'php', NULL, NULL, 5, '1', '2014-05-14', 1),
(6, 'payment', 'payment', 'php', NULL, NULL, 6, '1', '2014-05-09', 1),
(7, 'contact', 'contact', 'php', NULL, NULL, 7, '1', '2014-05-16', 1),
(8, 'flipbook', 'flipbook', 'php', 'flipbook', '<p><a href="http://www.youblisher.com/p/887265-ico-apict/" target="_blank"><img alt="ICO ApICT 2013" src="http://www.youblisher.com/files/publications/148/887265/200x300.jpg" style="height:283px; width:200px" /></a></p>\r\n', 8, '1', '2014-05-16', 1);

--
-- Triggers `cms_menu`
--
DROP TRIGGER IF EXISTS `trig_cms_menu`;
DELIMITER //
CREATE TRIGGER `trig_cms_menu` AFTER UPDATE ON `cms_menu`
 FOR EACH ROW INSERT INTO cms_riwayat_menu
(nama_menu, link_menu, ext, id_menu)
VALUES (OLD.nama_menu, OLD.link_file, OLD.ext, OLD.id_menu)
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `cms_order_urutan`
--

CREATE TABLE IF NOT EXISTS `cms_order_urutan` (
  `id_order_urutan` int(11) NOT NULL AUTO_INCREMENT,
  `order_urutan` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_order_urutan`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `cms_order_urutan`
--

INSERT INTO `cms_order_urutan` (`id_order_urutan`, `order_urutan`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5),
(6, 6),
(7, 7),
(8, 8),
(9, 9),
(10, 10),
(11, 11),
(12, 12);

-- --------------------------------------------------------

--
-- Table structure for table `cms_panitia`
--

CREATE TABLE IF NOT EXISTS `cms_panitia` (
  `id_pengguna` int(11) NOT NULL,
  `nik` char(11) DEFAULT NULL,
  `kategori_panitia` enum('1','2') DEFAULT '2',
  PRIMARY KEY (`id_pengguna`),
  KEY `id_kategori_panitia` (`kategori_panitia`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cms_panitia`
--

INSERT INTO `cms_panitia` (`id_pengguna`, `nik`, `kategori_panitia`) VALUES
(3, '41277012001', '1'),
(4, '41273403004', '2');

-- --------------------------------------------------------

--
-- Table structure for table `cms_paper`
--

CREATE TABLE IF NOT EXISTS `cms_paper` (
  `id_paper` char(5) NOT NULL DEFAULT '',
  `tgl_upload_paper` date DEFAULT NULL,
  `nama_file` varchar(100) DEFAULT NULL,
  `tipe_file` varchar(10) DEFAULT NULL,
  `id_abstrak` char(5) DEFAULT NULL,
  `status_review_paper` enum('1','2') DEFAULT '1',
  `review` text,
  `akhir_review` date DEFAULT NULL,
  `status_penerimaan_paper` enum('1','2','3') DEFAULT '3',
  `nilai` int(11) DEFAULT NULL,
  `kode_aktif` enum('0','1','2') DEFAULT '0',
  PRIMARY KEY (`id_paper`),
  KEY `id_abstrak` (`id_abstrak`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cms_paper`
--

INSERT INTO `cms_paper` (`id_paper`, `tgl_upload_paper`, `nama_file`, `tipe_file`, `id_abstrak`, `status_review_paper`, `review`, `akhir_review`, `status_penerimaan_paper`, `nilai`, `kode_aktif`) VALUES
('P0001', '2014-06-10', 'eko.pdf', 'pdf', 'A0001', '2', NULL, NULL, '2', 75, '2'),
('P0002', '2014-05-24', 'yenni.pdf', 'pdf', 'A0003', '2', NULL, NULL, '1', 40, '1'),
('P0003', '2014-05-24', 'rini.pdf', 'pdf', 'A0005', '2', NULL, NULL, '2', 70, '1'),
('P0004', '2014-05-31', 'dewi.pdf', 'pdf', 'A0006', '2', NULL, NULL, '2', 75, '1'),
('P0005', '2014-06-10', 'sintya.pdf', 'pdf', 'A0004', '1', NULL, NULL, '3', NULL, '1'),
('P0006', '2014-06-10', 'dimas.pdf', 'pdf', 'A0008', '2', 'perbaiki tulisan judul jangan memakai titik dua.', '2014-06-14', '2', 65, '1'),
('P0007', '2014-06-10', 'ofi.pdf', 'pdf', 'A0020', '1', NULL, NULL, '3', NULL, '1');

-- --------------------------------------------------------

--
-- Table structure for table `cms_pengguna`
--

CREATE TABLE IF NOT EXISTS `cms_pengguna` (
  `id_pengguna` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `pw` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `nama_pengguna` varchar(150) DEFAULT NULL,
  `jenis_kelamin` varchar(10) DEFAULT 'Male',
  `alamat` varchar(150) DEFAULT NULL,
  `telp` varchar(12) DEFAULT NULL,
  `kode_email` int(11) DEFAULT NULL,
  `kategori_pengguna` enum('1','2','3','4','5','6','7') DEFAULT '6',
  `kode_masalah` enum('1','2') DEFAULT NULL,
  PRIMARY KEY (`id_pengguna`),
  KEY `id_kategori_pengguna` (`kategori_pengguna`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=59 ;

--
-- Dumping data for table `cms_pengguna`
--

INSERT INTO `cms_pengguna` (`id_pengguna`, `username`, `password`, `pw`, `email`, `nama_pengguna`, `jenis_kelamin`, `alamat`, `telp`, `kode_email`, `kategori_pengguna`, `kode_masalah`) VALUES
(1, 'admin', 'e10adc3949ba59abbe56e057f20f883e', '123456', 'admin@seminar-penelitian.com', 'admin', 'Male', '-', '081291345346', NULL, '2', ''),
(2, 'mpermperpisang', '4dc2a159b17b4725943816b8ba6d7ff5', 'pisang', 'ferawati.10109266@gmail.com', 'ferawati hartanti pratiwi', 'Female', '-', '08128952087', NULL, '2', ''),
(3, 'salmon', '180fd182f9a0742f483619781ccc36c4', 'salmon', 'ketuapt@ico-apict.unikom.ac.id', 'salmon priaji martana', 'Male', '-', '0', NULL, '3', ''),
(4, 'ony', '120c6a844b221d39bcaddf88fd87cd5e', 'ony', 'onykulestari@yahoo.com', 'ony widilestaringtyas', 'Female', '-', '0', NULL, '3', ''),
(5, 'eko', 'e5ea9b6d71086dfef3a15f726abcc5bf', 'eko', 'ekobudisetiawan@ymail.com', 'Eko Budi Setiawan', 'Male', '-', '0', NULL, '1', ''),
(6, 'lusi', 'c842ecc88a0ff8fd0105eaeabf71999d', 'lusi', 'lusimelian@yahoo.com', 'lusi melian', 'Female', '-', '0', NULL, '1', ''),
(7, 'jani', 'd5d51a2d88cda585e37315067891381f', 'jani', 'janivita@gmail.com', ' janivita joto sudirham', 'Female', '-', '0', NULL, '1', ''),
(8, 'aria', 'aafa7ed7cc46d6b04fc6e2b20baab657', 'aria', 'ariar554@gmail.com', 'Muhammad Aria Rajasa', 'Male', '-', '0', NULL, '4', ''),
(9, 'irawan', 'b18f96670a496a5f27529ab93efdf164', 'irawan', 'irawan_afrianto@yahoo.com', 'Irawan Afrianto', 'Male', '-', '0', NULL, '4', ''),
(10, 'taufan', '92e9d63200f28086a3acb972738881e1', 'taufan', 'taufan@gmail.com', 'Taufan Hidayatullah', 'Male', '-', '0', NULL, '4', ''),
(11, 'yeffry', 'd76aecaeb55b1af656c32ce4f7af22d2', 'yeffry', 'yeffryhp@yahoo.com', 'yeffry handoko putra', 'Male', '-', '0', NULL, '4', ''),
(12, 'eddy', '5aa8fed9741d33c63868a87f1af05ab7', 'eddy', 'rector@unikom.ac.id', 'Eddy Soeryanto Soegoto', 'Male', '-', '0', NULL, '5', ''),
(13, 'umi', 'e84f942d7f93ddc14d24b930d87e3da7', 'umi', 'umi@gmail.com', 'Umi Narimawati', 'Female', '-', '0', NULL, '5', ''),
(14, 'ria', 'd42a9ad09e9778b177d409f5716ac621', 'ria', 'ria@yahoo.com', 'Ria Ratna Ariawati', 'Female', '-', '0', NULL, '5', ''),
(15, 'aelina', '65d991e86f7204c199e7976bda4f370d', 'aelina', 'aelina@yahoo.com', 'Aelina surya', 'Female', '-', '0', NULL, '5', ''),
(16, 'denny', '3425f115ee1ecf591fb06d635c37d990', 'denny', 'denny@gmail.com', 'denny kurniadie', 'Male', '-', '0', NULL, '5', ''),
(17, 'yenni', 'dc4781c378a78c3aebfe6680433bb25a', 'yenni', 'yenni.md@fulbrightmail.org', 'yenni merlin djajalaksana', 'Female', '-', '0', NULL, '1', ''),
(18, 'sintya', '8ca778d88fe9df2f05ef18bf6e5fe0ef', 'sintya', 'see.shinty@gmail.com', 'sintya sukarta', 'Female', '-', '0', NULL, '1', ''),
(19, 'rini', 'b86872751de1e13c142d050acfd09842', 'rini', 'rinisuwartika@yahoo.com', 'rini suwartika', 'Female', '-', '0', NULL, '1', ''),
(20, 'agung', 'e59cd3ce33a68f536c19fedb82a7936f', 'agung', 'agung11@mhs.if.its.ac.id', 'agung brastama putra', 'Male', '-', '0', NULL, '1', ''),
(21, 'novrini', '0ae2246b679330c473077949a3a0f9e5', 'novrini', 'nhasti@yahoo.com', 'novrini hasti', 'Female', '-', '0', NULL, '1', ''),
(22, 'dewi', 'ed1d859c50262701d92e5cbf39652792', 'dewi', 'dekur010575@yahoo.com', 'dewi kurniasih', 'Female', '-', '0', NULL, '1', ''),
(23, 'andrias', 'feafc00ee3fdc20860fbdb1d48c353a6', 'andrias', 'andredarma@gmail.com', 'andrias darmayadi', 'Male', '-', '0', NULL, '1', ''),
(24, 'dian', 'f97de4a9986d216a6e0fea62b0450da9', 'dian', 'dian_purworini@fki.ums.ac.id', 'dian purworini', 'Female', '-', '0', NULL, '1', ''),
(25, 'darwin', '3750c667d5cd8aecc0a9213b362066e9', 'darwin', 'darwin@yahoo.com', 'darwin ginting', 'Male', '-', '0', NULL, '1', ''),
(26, 'citra', 'e260eab6a7c45d139631f72b55d8506b', 'citra', 'cia_nova@yahoo.com', 'citra noviyasari', 'Female', '-', '0', NULL, '1', ''),
(27, 'sata', 'cc5b3ba82492df7968cf0db028336a85', 'sata', 'aswel.legion@gmail.com', 'sata aswel putra', 'Male', '-', '0', NULL, '1', ''),
(28, 'windy', '22a57394810fd219eb7bbd163021c270', 'windy', 'windi.novianti@gmail.com', 'windy noviyanti', 'Female', '-', '0', NULL, '1', ''),
(29, 'raeni', '3e73d5ee7981da0d3f88fb8789d6a1aa', 'raeni', 'raeny_wijaya@yahoo.com', 'raeni dwi santy', 'Female', '-', '0', NULL, '1', ''),
(30, 'sri', 'd1565ebd8247bbb01472f80e24ad29b6', 'sri', 'dewianggadini8@gmail.com', 'sri dewi anggadini', 'Female', '-', '0', NULL, '1', ''),
(31, 'linna', 'afcf18ce63442755f9068f4473867a0f', 'linna', 'linna@gmail.com', 'linna ismawati', 'Female', '-', '0', NULL, '1', ''),
(32, 'lita', '49412fd636fd83443f647ac65665c1d8', 'lita', 'lita@yahoo.com', 'lita wulantika', 'Female', '-', '0', NULL, '1', ''),
(33, 'siti', 'db04eb4b07e0aaf8d1d477ae342bdff9', 'siti', 'siti@gmail.com', 'siti kurnia rahayu', 'Female', '-', '0', NULL, '1', ''),
(34, 'maman', '6ffee7d3af984c95d72d813efda2d919', 'maman', 'maman@yahoo.com', 'maman kusman', 'Male', '-', '0', NULL, '1', ''),
(35, 'ofi', 'd15249b2b3df63eaefab87103f869c08', 'ofi', 'faychopper@gmail.com', 'ofi mulyana', 'Male', '-', '0', NULL, '1', ''),
(36, 'supriyati', 'b4113ea50df609c76d0082c483cb0d57', 'supriyati', 'mandasupriyati@gmail.com', 'supriyati', 'Female', '-', '0', NULL, '1', ''),
(37, 'rio', 'd5ed38fdbf28bc4e58be142cf5a17cf5', 'rio', 'abighazy@gmail.com', 'rio yunanto', 'Male', '-', '0', NULL, '1', ''),
(38, 'muhammad', 'bf5b75ee196bca9e194d1628b6fdd260', 'muhammad ', 'ihsani55@yahoo.co.id', 'muhammad ihsan', 'Male', '-', '0', NULL, '1', ''),
(39, 'cherry', 'c7a4476fc64b75ead800da9ea2b7d072', 'cherry', 'abuskadusweh@yahoo.com', 'cherry dharmawan', 'Female', '-', '0', NULL, '1', ''),
(40, 'yully', '522877abe2eee39c94691b8a29aff64f', 'yully', 'kineka69@gmail.com', 'yully ambarsih', 'Female', '-', '0', NULL, '1', ''),
(41, 'susmini', '146a343d711e498cdb5e4839f9446f1a', 'susmini', 'lestariningati@yahoo.com', 'susmini indriani lestariningati', 'Female', '-', '0', NULL, '1', ''),
(42, 'dimas', '7d49e40f4b3d8f68c19406a58303f826', 'dimas', 'dimas@yahoo.com', 'dimas widyasastrena', 'Male', '-', '0', NULL, '1', ''),
(43, 'tri', 'd2cfe69af2d64330670e08efb2c86df7', 'tri', 'tri@gmail.com', 'tri rahajoeningroem', 'Female', '-', '0', NULL, '1', ''),
(44, 'agus', 'fdf169558242ee051cca1479770ebac3', 'agus', 'agusriyantounikom1@yahoo.com', 'agus riyanto', 'Male', '-', '0', NULL, '1', ''),
(45, 'rahy', 'df87601c31c85094f74d722817d5f9c7', 'rahy', 'rahy@gmail.com', 'rahy sukardi', 'Male', '-', '0', NULL, '1', ''),
(46, 'jana', '9439aec52eb100234ad0d3bf4471b575', 'jana', 'jana@yahoo.com', 'jana utama', 'Male', '-', '0', NULL, '1', ''),
(47, 'wisnu', '67340a8acc49d521d7fdd25db913bf9d', 'wisnu', 'wisnu@yahoo.com', 'wisnu aji kharisma', 'Male', '-', '0', NULL, '1', ''),
(48, 'toto', 'f71dbe52628a3f83a77ab494817525c6', 'toto', 'toto@gmail.com', 'toto indriyanto', 'Male', '-', '0', NULL, '1', ''),
(49, 'vivi', 'c3bb6f719742fd1e5768d6d1361cfb49', 'vivi', 'ipi.mieman@gmail.com', 'vivi sumanti', 'Female', '-', '0', NULL, '1', ''),
(50, 'apriani', 'd9fe889536d410d434d34549a7ebdaf5', 'apriani', 'apriani@yahoo.com', 'apriani puti purfini', 'Female', '-', '0', NULL, '1', ''),
(51, 'teddy', '962b2d2b8e72dc6771bca613d49b46fb', 'teddy', 'deathlikecote@gmail.com', 'teddy septian hanadi', 'Male', '-', '0', NULL, '1', ''),
(52, 'hery', '11357611cb1b43ff3138d1eba068644b', 'hery', 'denderpete@yahoo.com', 'hery dwi yulianto', 'Male', '-', '0', NULL, '1', ''),
(53, 'rika', 'e32994c67f9a773e841f9e97bd26f014', 'rika', 'rikafebryanipermana@gmail.com', 'rika febryani permana', 'Female', '-', '0', NULL, '1', ''),
(54, 'risma', 'bfa979396545edee06b67e768970d275', 'risma', 'risma@yahoo.com', 'risma purnama', 'Female', '-', '0', NULL, '1', ''),
(55, 'adyt', '09b43236babecf1c643777cc22973935', 'adyt', 'adyt@yahoo.com', 'adyt nurdianto', 'Male', '-', '0', NULL, '1', ''),
(56, 'emalia', 'eafbbc600755b3f6046604d277a51ef7', 'emalia', 'emalia@gmail.com', 'emalia fitrianty', 'Female', '-', '0', NULL, '1', ''),
(57, 'erma', '56804d9960eade3d70137caedb51b97e', 'erma', 'erma@gmail.com', 'erma suryani', 'Female', '-', '0', NULL, '1', ''),
(58, 'mper', '0d0497b1033ae5d74ac1c329909a2750', 'mper', 'mpermperpisang@gmail.com', 'ferawati hartanti pratiwi', 'Female', '-', '-', NULL, '1', '');

-- --------------------------------------------------------

--
-- Table structure for table `cms_penulis`
--

CREATE TABLE IF NOT EXISTS `cms_penulis` (
  `id_penulis` int(11) NOT NULL AUTO_INCREMENT,
  `id_abstrak` char(5) DEFAULT NULL,
  `nama_penulis` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`id_penulis`),
  KEY `id_abstrak` (`id_abstrak`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `cms_penulis`
--

INSERT INTO `cms_penulis` (`id_penulis`, `id_abstrak`, `nama_penulis`) VALUES
(1, 'A0013', 'Erma Suryani'),
(2, 'A0014', 'Budi Mulyana'),
(3, 'A0014', 'Dewi Triwahyuni'),
(4, 'A0014', 'Sylvia Octa Putri'),
(5, 'A0007', 'Emalia Fitrianty'),
(6, 'A0006', 'Hery Dwi Yulianto'),
(7, 'A0008', 'Toto Indriyanto'),
(8, 'A0017', 'Adyt Nurdianto'),
(9, 'A0018', 'Risma Purnama'),
(10, 'A0019', 'Adhityo Seno Aji');

-- --------------------------------------------------------

--
-- Table structure for table `cms_peserta`
--

CREATE TABLE IF NOT EXISTS `cms_peserta` (
  `id_pengguna` int(11) NOT NULL,
  `kategori_peserta` enum('1','2') DEFAULT NULL,
  `foto` varchar(100) DEFAULT NULL,
  `tipe_file` varchar(10) DEFAULT NULL,
  `no_identitas` varchar(50) DEFAULT '0',
  `institusi` varchar(150) DEFAULT NULL,
  `jabatan` varchar(50) DEFAULT NULL,
  `hadir_presentasi` int(11) DEFAULT '2',
  `ttd` varchar(100) DEFAULT NULL,
  `id_tahun` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_pengguna`),
  KEY `id_kategori_peserta` (`kategori_peserta`),
  KEY `id_hadir_presentasi` (`hadir_presentasi`),
  KEY `id_tahun` (`id_tahun`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cms_peserta`
--

INSERT INTO `cms_peserta` (`id_pengguna`, `kategori_peserta`, `foto`, `tipe_file`, `no_identitas`, `institusi`, `jabatan`, `hadir_presentasi`, `ttd`, `id_tahun`) VALUES
(5, '1', 'male', 'jpg', '0', 'Universitas Komputer Indonesia', 'Dosen', 1, '5.jpg', 1),
(6, '2', 'female', 'jpg', '0', '-', '-', 1, NULL, 1),
(7, '2', 'female', 'jpg', '0', '-', '-', 1, NULL, 1),
(17, '1', 'female', 'jpg', '0', '-', '-', 2, NULL, 1),
(18, '1', 'female', 'jpg', '0', '-', '-', 2, NULL, 1),
(19, '1', 'female', 'jpg', '0', '-', '-', 1, '19.png', 1),
(20, '1', 'male', 'jpg', '0', '-', '-', 2, NULL, 1),
(21, '1', 'female', 'jpg', '0', '-', '-', 2, NULL, 1),
(22, '1', 'female', 'jpg', '0', '-', '-', 1, NULL, 1),
(23, '1', 'male', 'jpg', '0', '-', '-', 2, NULL, 1),
(24, '1', 'female', 'jpg', '0', '-', '-', 2, NULL, 1),
(25, '1', 'male', 'jpg', '0', '-', '-', 2, NULL, 1),
(26, '1', 'female', 'jpg', '0', '-', '-', 2, NULL, 1),
(27, '2', 'male', 'jpg', '0', '-', '-', 2, NULL, 1),
(28, '1', 'female', 'jpg', '0', '-', '-', 2, NULL, 1),
(29, '1', 'female', 'jpg', '0', '-', '-', 2, NULL, 1),
(30, '1', 'female', 'jpg', '0', '-', '-', 2, NULL, 1),
(31, '1', 'female', 'jpg', '0', '-', '-', 2, NULL, 1),
(32, '1', 'female', 'jpg', '0', '-', '-', 2, NULL, 1),
(33, '1', 'female', 'jpg', '0', '-', '-', 2, NULL, 1),
(34, '1', 'male', 'jpg', '0', '-', '-', 2, NULL, 1),
(35, '1', 'male', 'jpg', '0', '-', '-', 1, NULL, 1),
(36, '1', 'female', 'jpg', '0', '-', '-', 2, NULL, 1),
(37, '1', 'male', 'jpg', '0', '-', '-', 2, NULL, 1),
(38, '1', 'male', 'jpg', '0', '-', '-', 2, NULL, 1),
(39, '1', 'female', 'jpg', '0', '-', '-', 2, NULL, 1),
(40, '1', 'female', 'jpg', '0', '-', '-', 2, NULL, 1),
(41, '1', 'female', 'jpg', '0', '-', '-', 2, NULL, 1),
(42, '1', 'male', 'jpg', '0', '-', '-', 2, NULL, 1),
(43, '1', 'female', 'jpg', '0', 'Universitas Komputer Indonesia', '-', 2, NULL, 1),
(44, '2', 'male', 'jpg', '0', '-', '-', 2, NULL, 1),
(45, '2', 'male', 'jpg', '0', '-', '-', 2, NULL, 1),
(46, '2', 'male', 'jpg', '0', '-', '-', 2, NULL, 1),
(47, '2', 'male', 'jpg', '0', '-', '-', 2, NULL, 1),
(48, '2', 'male', 'jpg', '0', '-', '-', 2, NULL, 1),
(49, '2', 'female', 'jpg', '0', '-', '-', 2, NULL, 1),
(50, '2', 'female', 'jpg', '0', '-', '-', 2, NULL, 1),
(51, '2', 'male', 'jpg', '0', '-', '-', 2, NULL, 1),
(52, '2', 'male', 'jpg', '0', '-', '-', 2, NULL, 1),
(53, '2', 'female', 'jpg', '0', '-', '-', 2, NULL, 1),
(54, '2', 'female', 'jpg', '0', '-', '-', 2, NULL, 1),
(55, '2', 'male', 'jpg', '0', '-', '-', 2, NULL, 1),
(56, '2', 'female', 'jpg', '0', '-', '-', 2, NULL, 1),
(57, '2', 'female', 'jpg', '0', '-', '-', 2, NULL, 1),
(58, '1', 'female', 'jpg', '0', '-', '-', 2, NULL, 2);

-- --------------------------------------------------------

--
-- Table structure for table `cms_pimpinan`
--

CREATE TABLE IF NOT EXISTS `cms_pimpinan` (
  `id_pengguna` int(11) NOT NULL,
  `kategori_pimpinan` enum('1','2','3') DEFAULT '3',
  PRIMARY KEY (`id_pengguna`),
  KEY `id_kategori_rektorat` (`kategori_pimpinan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cms_pimpinan`
--

INSERT INTO `cms_pimpinan` (`id_pengguna`, `kategori_pimpinan`) VALUES
(12, '1'),
(13, '2'),
(14, '2'),
(15, '2'),
(16, '3');

-- --------------------------------------------------------

--
-- Table structure for table `cms_postingan`
--

CREATE TABLE IF NOT EXISTS `cms_postingan` (
  `id_postingan` int(11) NOT NULL AUTO_INCREMENT,
  `judul` varchar(200) DEFAULT NULL,
  `content` text,
  `id_pengguna` int(11) DEFAULT NULL,
  `kategori_posting` enum('1','2','3','4','5','6','7','8','9','10','11','12','13','14','15') DEFAULT NULL,
  `date` date DEFAULT NULL,
  PRIMARY KEY (`id_postingan`),
  KEY `id_pengguna` (`id_pengguna`),
  KEY `id_kategori_posting` (`kategori_posting`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `cms_postingan`
--

INSERT INTO `cms_postingan` (`id_postingan`, `judul`, `content`, `id_pengguna`, `kategori_posting`, `date`) VALUES
(1, 'announcement', 'announcement', 1, '1', '2014-06-12'),
(2, 'ICO - APICT 2013', '<p>&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; The rapid development of ICT, has enabled the technology to underpin many aspects of life. Various scientific fields tend to use and apply ICT to make the operation more effective and easier. Today, the use of ICT is ranging from engineering, economics, politics, law, literature to art, utilizing it in various forms and requirements.</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; With ICT, those fields can optimize their work and even get new opportunities in the developing the endeavor to reach beyond current possibilities. This is possible due to the effective and efficient manner of the ICT. With this technology, distance, time, will be no longer a boundary to support further areas of optimized scientific resources.</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; This seminar is intended to summarize the research idea as well as to promote other forms of real implementation of the use and role of ICT in the field of engineering, economics, politics, law, literature and art.</p>\r\n', 1, '2', '2014-05-27'),
(3, 'theme', '<h4 style="text-align: center;"><strong>EMPOWERING DEVELOPMENT COUNTRY THROUGH SUSTAINABLE ICT</strong></h4>\r\n', 1, '3', '2014-04-27'),
(4, 'Category of Paper', '<table border="0" cellpadding="1" cellspacing="1" style="height:523px; width:500px">\r\n	<tbody>\r\n		<tr>\r\n			<td><span style="color:rgb(0, 0, 0); font-family:times new roman; font-size:medium"><span style="font-family:arial,helvetica,sans-serif; font-size:12px">Technopreneur</span></span></td>\r\n			<td><span style="color:rgb(0, 0, 0); font-family:times new roman; font-size:medium"><span style="font-family:arial,helvetica,sans-serif; font-size:12px">E-Commerce</span></span></td>\r\n		</tr>\r\n		<tr>\r\n			<td><span style="color:rgb(0, 0, 0); font-family:times new roman; font-size:medium"><span style="font-family:arial,helvetica,sans-serif; font-size:12px">Information Systems</span></span></td>\r\n			<td><span style="color:rgb(0, 0, 0); font-family:times new roman; font-size:medium"><span style="font-family:arial,helvetica,sans-serif; font-size:12px">Strategic Information System</span></span></td>\r\n		</tr>\r\n		<tr>\r\n			<td><span style="color:rgb(0, 0, 0); font-family:times new roman; font-size:medium"><span style="font-family:arial,helvetica,sans-serif; font-size:12px">E-Government</span></span></td>\r\n			<td><span style="color:rgb(0, 0, 0); font-family:times new roman; font-size:medium"><span style="font-family:arial,helvetica,sans-serif; font-size:12px">Database Management</span></span></td>\r\n		</tr>\r\n		<tr>\r\n			<td><span style="color:rgb(0, 0, 0); font-family:times new roman; font-size:medium"><span style="font-family:arial,helvetica,sans-serif; font-size:12px">Semantic</span></span></td>\r\n			<td><span style="color:rgb(0, 0, 0); font-family:times new roman; font-size:medium"><span style="font-family:arial,helvetica,sans-serif; font-size:12px">Game Development</span></span></td>\r\n		</tr>\r\n		<tr>\r\n			<td><span style="color:rgb(0, 0, 0); font-family:times new roman; font-size:medium"><span style="font-family:arial,helvetica,sans-serif; font-size:12px">Industrial Engineering</span></span></td>\r\n			<td><span style="color:rgb(0, 0, 0); font-family:times new roman; font-size:medium"><span style="font-family:arial,helvetica,sans-serif; font-size:12px">Intelligent System</span></span></td>\r\n		</tr>\r\n		<tr>\r\n			<td><span style="color:rgb(0, 0, 0); font-family:times new roman; font-size:medium"><span style="font-family:arial,helvetica,sans-serif; font-size:12px">Expert System</span></span></td>\r\n			<td><span style="color:rgb(0, 0, 0); font-family:times new roman; font-size:medium"><span style="font-family:arial,helvetica,sans-serif; font-size:12px">Operating System</span></span></td>\r\n		</tr>\r\n		<tr>\r\n			<td><span style="color:rgb(0, 0, 0); font-family:times new roman; font-size:medium"><span style="font-family:arial,helvetica,sans-serif; font-size:12px">Bioinformatics</span></span></td>\r\n			<td><span style="color:rgb(0, 0, 0); font-family:times new roman; font-size:medium"><span style="font-family:arial,helvetica,sans-serif; font-size:12px">Computer Network</span></span></td>\r\n		</tr>\r\n		<tr>\r\n			<td><span style="color:rgb(0, 0, 0); font-family:times new roman; font-size:medium"><span style="font-family:arial,helvetica,sans-serif; font-size:12px">Computer Vision</span></span></td>\r\n			<td><span style="color:rgb(0, 0, 0); font-family:times new roman; font-size:medium"><span style="font-family:arial,helvetica,sans-serif; font-size:12px">Neural Network</span></span></td>\r\n		</tr>\r\n		<tr>\r\n			<td><span style="color:rgb(0, 0, 0); font-family:times new roman; font-size:medium"><span style="font-family:arial,helvetica,sans-serif; font-size:12px">Animation</span></span></td>\r\n			<td><span style="color:rgb(0, 0, 0); font-family:times new roman; font-size:medium"><span style="font-family:arial,helvetica,sans-serif; font-size:12px">Cloud Computing</span></span></td>\r\n		</tr>\r\n		<tr>\r\n			<td><span style="color:rgb(0, 0, 0); font-family:times new roman; font-size:medium"><span style="font-family:arial,helvetica,sans-serif; font-size:12px">Mobile Application</span></span></td>\r\n			<td><span style="color:rgb(0, 0, 0); font-family:times new roman; font-size:medium"><span style="font-family:arial,helvetica,sans-serif; font-size:12px">Geographic Information System</span></span></td>\r\n		</tr>\r\n		<tr>\r\n			<td><span style="color:rgb(0, 0, 0); font-family:times new roman; font-size:medium"><span style="font-family:arial,helvetica,sans-serif; font-size:12px">Risk Management</span></span></td>\r\n			<td><span style="color:rgb(0, 0, 0); font-family:times new roman; font-size:medium"><span style="font-family:arial,helvetica,sans-serif; font-size:12px">Customer Relationship Management</span></span></td>\r\n		</tr>\r\n		<tr>\r\n			<td><span style="color:rgb(0, 0, 0); font-family:times new roman; font-size:medium"><span style="font-family:arial,helvetica,sans-serif; font-size:12px">Web Application</span></span></td>\r\n			<td><span style="color:rgb(0, 0, 0); font-family:times new roman; font-size:medium"><span style="font-family:arial,helvetica,sans-serif; font-size:12px">E-Learning</span></span></td>\r\n		</tr>\r\n		<tr>\r\n			<td><span style="color:rgb(0, 0, 0); font-family:times new roman; font-size:medium"><span style="font-family:arial,helvetica,sans-serif; font-size:12px">Multimedia Apllication</span></span></td>\r\n			<td><span style="color:rgb(0, 0, 0); font-family:times new roman; font-size:medium"><span style="font-family:arial,helvetica,sans-serif; font-size:12px">Cluster Computing</span></span></td>\r\n		</tr>\r\n		<tr>\r\n			<td><span style="color:rgb(0, 0, 0); font-family:times new roman; font-size:medium"><span style="font-family:arial,helvetica,sans-serif; font-size:12px">Data Mining</span></span></td>\r\n			<td><span style="color:rgb(0, 0, 0); font-family:times new roman; font-size:medium"><span style="font-family:arial,helvetica,sans-serif; font-size:12px">Software Engineering</span></span></td>\r\n		</tr>\r\n		<tr>\r\n			<td><span style="color:rgb(0, 0, 0); font-family:times new roman; font-size:medium"><span style="font-family:arial,helvetica,sans-serif; font-size:12px">Data Center</span></span></td>\r\n			<td><span style="color:rgb(0, 0, 0); font-family:times new roman; font-size:medium"><span style="font-family:arial,helvetica,sans-serif; font-size:12px">Network and Security</span></span></td>\r\n		</tr>\r\n		<tr>\r\n			<td><span style="color:rgb(0, 0, 0); font-family:times new roman; font-size:medium"><span style="font-family:arial,helvetica,sans-serif; font-size:12px">Human Computer Interaction</span></span></td>\r\n			<td><span style="color:rgb(0, 0, 0); font-family:times new roman; font-size:medium"><span style="font-family:arial,helvetica,sans-serif; font-size:12px">Decision Support System</span></span></td>\r\n		</tr>\r\n		<tr>\r\n			<td><span style="color:rgb(0, 0, 0); font-family:times new roman; font-size:medium"><span style="font-family:arial,helvetica,sans-serif; font-size:12px">Paralel Processing</span></span></td>\r\n			<td><span style="color:rgb(0, 0, 0); font-family:times new roman; font-size:medium"><span style="font-family:arial,helvetica,sans-serif; font-size:12px">Computer Graphic</span></span></td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', 1, '4', '2014-04-27'),
(5, 'keynote speakers', '<p><strong>Minister Of ICT of The Republic of Indonesia</strong> : Ir. H. Tifatul Sembiring *</p>\r\n\r\n<p><strong>Governor of java</strong> : H. Ahmad Heryawan, Lc *</p>\r\n', 1, '5', '2014-04-27'),
(6, 'invite speakers', '<ul>\r\n	<li>Prof. Dr. Ir. Richardus Eko Indrajit M.Sc., MBA , Mphil., MA * (<strong>Chairman of APTIKOM Indonesia</strong>)</li>\r\n	<li>Assoc. Prof. Dr. Nguyen, Huu-Thanh (<strong>Hanoi University of Science and Technology</strong>)</li>\r\n	<li>Prof Madya Dr. Huda (<strong>Universiti Utara Malaysia (UUM)</strong>)</li>\r\n	<li>Prof.Dr.Kyung Chan Lee (<strong>Yongsan University</strong>)</li>\r\n	<li>Prof. Dr. Je Dae Sik (<strong>Yongsan University</strong>)</li>\r\n	<li>Prof.Dr.Hideo Izumida * (<strong>Toyohashi University of Technology</strong>)</li>\r\n	<li>Dr. Yusrila Kerlooza (<strong>Universitas Komputer Indonesia</strong>)</li>\r\n</ul>\r\n', 1, '6', '2014-04-27'),
(7, 'chairman', '<p>Dr. Salmon Martana</p>\r\n', 1, '7', '2014-04-27'),
(8, 'secretary', '<p>Dr. Ony Widilestaringtyas</p>\r\n', 1, '8', '2014-04-27'),
(9, 'organizing committees', '<p>Faculty Of Computer Science and Engineering<br />\r\nUniversitas Komputer Indonesia<br />\r\nGedung 4 Lt. 3 Bandung 40132 Indonesia<br />\r\nPhone : +62-22-2504119<br />\r\nFax : +62-22-2533754</p>\r\n', 1, '9', '2014-04-27'),
(10, 'advisory board', '<ul>\r\n	<li>Dr.Ir. Edy Suryanto Soegoto - <strong>Rector of Unikom</strong></li>\r\n	<li>Prof.Dr.Hj.Umi Narimawati Dra. SE. M.Si - <strong>Vice Rector I - Unikom</strong></li>\r\n	<li>Prof Dr. Hj. Ria Ratna Ariawati, MS., A.k. - <strong>Vice Rector II - Unikom</strong></li>\r\n	<li>Prof. Dr. Hj. Aelina Surya - <strong>Vice Rector III - Unikom</strong></li>\r\n	<li>Prof. Dr. Hj. Denny Kurniadie, Ir., M.Sc. - <strong>Dean Of Faculty Of Computer Science and Engineering Dean Of Faculty Of Computer Science and Engineer</strong></li>\r\n</ul>\r\n', 1, '10', '2014-04-27'),
(11, 'important date', '<ul>\r\n	<li>Publication: May 1st 2013</li>\r\n	<li>Abstract Submission: May 1st - June 28th 2013 - <strong><span style="background-color:rgb(255, 0, 0)">EXTENDED</span></strong> Until 1 September 2013</li>\r\n	<li>Notification of abstract Acceptence: July 28th 2013 <strong><span style="background-color:rgb(255, 0, 0)">EXTENDED </span></strong>Until 10 September 2013</li>\r\n	<li>Full Paper Submission: August 1st - 28th 2013 <strong><span style="background-color:rgb(255, 0, 0)">EXTENDED </span></strong>Until 20 September 2013</li>\r\n	<li>Registration Presenter : September 8th - 20th 2013 <strong><span style="background-color:rgb(255, 0, 0)">EXTENDED </span></strong>Until 25 September 2013</li>\r\n	<li>Registration Participant : Until September 20th 2013 <strong><span style="background-color:rgb(255, 0, 0)">EXTENDED </span></strong>Until 25 September 2013</li>\r\n	<li>Conference Date : October 2nd - 3rd 2013</li>\r\n	<li>City Tour : 4th October 2013\r\n	<div style="font-style:italic;">Notes:Tours are available for additional cost</div>\r\n	</li>\r\n</ul>\r\n', 1, '11', '2014-04-27'),
(12, 'venue', '<p>Miracle Hall<br />\r\n<strong>Universitas Komputer Indonesia (UNIKOM)</strong><br />\r\nJl Dipatiukur No 112-114-116 Bandung 80361<br />\r\nBandung - Indonesia</p>\r\n', NULL, '12', '2014-04-27'),
(13, 'registration fee', '<p>Registration fee includes the attendances in all scienctific session, seminar kit, lunch and coffee breaks, proceeding and the CD of Conference Proceeding. An author is allowed to submit and present maximum 2 papers in conference (the fee will be added 50% for second paper)</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<table align="center" style="width:60%">\r\n	<tbody>\r\n		<tr>\r\n			<td style="background-color: rgb(0, 102, 255);">&nbsp;</td>\r\n			<td style="background-color: rgb(0, 102, 255);"><span style="color:#FFF0F5"><strong>International</strong></span></td>\r\n			<td style="background-color: rgb(0, 102, 255);"><span style="color:#FFF0F5"><strong>National</strong></span></td>\r\n		</tr>\r\n		<tr>\r\n			<td>Presenter</td>\r\n			<td>$150</td>\r\n			<td>Rp. 750.000</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Presenter (Student)</td>\r\n			<td>$100</td>\r\n			<td>Rp. 500.000</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Participant</td>\r\n			<td>$75</td>\r\n			<td>Rp. 500.000<br />\r\n			Rp. 250.000(Student)</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;\r\n<ul>\r\n	<li>Early bird for international presenter $100 (valid until June 2013)</li>\r\n	<li>Additional charge for city tour Rp. 200.000.</li>\r\n</ul>\r\n</p>\r\n\r\n<p>&nbsp;</p>\r\n', NULL, '13', '2014-04-27'),
(14, 'payment', '<table align="center" style="height:84px; width:289px">\r\n	<tbody>\r\n		<tr>\r\n			<td style="background-color:rgb(0, 102, 255)"><strong><span style="color:#FFF0F5">Bank</span></strong></td>\r\n			<td>:</td>\r\n			<td>BNI</td>\r\n		</tr>\r\n		<tr>\r\n			<td style="background-color:rgb(0, 102, 255)"><strong><span style="color:#FFF0F5">Account Number</span></strong></td>\r\n			<td>:</td>\r\n			<td>0301012903</td>\r\n		</tr>\r\n		<tr>\r\n			<td style="background-color:rgb(0, 102, 255)"><strong><span style="color:#FFF0F5">Swift Code</span></strong></td>\r\n			<td>:</td>\r\n			<td>BNINIDJA</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', NULL, '14', '2014-04-27'),
(15, 'contact', '<p>Jl Dipatiukur No 112-114-116 80361<br />\r\nBandung, Indonesia 12345-6789</p>\r\n\r\n<p>Telp: +62 22-2504119<br />\r\nFax: +62 22-2504119</p>\r\n\r\n<p>Web: <a href="http://unikom.ac.id">unikom.ac.id</a><br />\r\nEmail: <a href="http://seminar-penelitian.com">seminar-penelitian.com</a></p>\r\n', NULL, '15', '2014-04-27');

-- --------------------------------------------------------

--
-- Table structure for table `cms_reviewer`
--

CREATE TABLE IF NOT EXISTS `cms_reviewer` (
  `id_pengguna` int(11) NOT NULL,
  `nik` char(11) DEFAULT NULL,
  PRIMARY KEY (`id_pengguna`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cms_reviewer`
--

INSERT INTO `cms_reviewer` (`id_pengguna`, `nik`) VALUES
(8, '41277004008'),
(9, '41277006009'),
(10, '41273206003'),
(11, '41277005001');

-- --------------------------------------------------------

--
-- Table structure for table `cms_riwayat_menu`
--

CREATE TABLE IF NOT EXISTS `cms_riwayat_menu` (
  `id_riwayat_menu` int(11) NOT NULL AUTO_INCREMENT,
  `nama_menu` varchar(25) DEFAULT NULL,
  `link_menu` varchar(150) DEFAULT NULL,
  `ext` varchar(10) NOT NULL,
  `id_menu` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_riwayat_menu`),
  KEY `id_menu` (`id_menu`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `cms_scan_transfer`
--

CREATE TABLE IF NOT EXISTS `cms_scan_transfer` (
  `id_scan_transfer` int(11) NOT NULL AUTO_INCREMENT,
  `date_upload` date DEFAULT NULL,
  `nama_scan` int(11) DEFAULT NULL,
  `tipe_file` varchar(10) DEFAULT NULL,
  `status_bayar` enum('1','2') DEFAULT '1',
  `id_pengguna` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_scan_transfer`),
  UNIQUE KEY `id_pengguna` (`id_pengguna`),
  KEY `id_status_bayar` (`status_bayar`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `cms_scan_transfer`
--

INSERT INTO `cms_scan_transfer` (`id_scan_transfer`, `date_upload`, `nama_scan`, `tipe_file`, `status_bayar`, `id_pengguna`) VALUES
(1, '2014-05-24', 7, 'jpg', '2', 7),
(2, '2014-05-24', 5, 'jpg', '2', 5),
(3, '2014-05-24', 6, 'jpg', '2', 6),
(4, '2014-05-24', 19, 'jpg', '2', 19),
(5, '2014-05-31', 22, 'jpg', '1', 22),
(6, '2014-06-11', 42, 'jpg', '1', 42);

-- --------------------------------------------------------

--
-- Table structure for table `cms_stempel_ttd`
--

CREATE TABLE IF NOT EXISTS `cms_stempel_ttd` (
  `id_stempel_ttd` int(11) NOT NULL AUTO_INCREMENT,
  `nama_file` varchar(100) DEFAULT NULL,
  `tipe_file` varchar(10) DEFAULT NULL,
  `id_pengguna` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_stempel_ttd`),
  KEY `id_pengguna` (`id_pengguna`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `cms_tahun`
--

CREATE TABLE IF NOT EXISTS `cms_tahun` (
  `id_tahun` int(11) NOT NULL AUTO_INCREMENT,
  `bil_tahun` char(4) NOT NULL,
  `kode_aktif` enum('0','1') NOT NULL DEFAULT '0',
  `tgl_akhir` date DEFAULT '0000-00-00',
  PRIMARY KEY (`id_tahun`),
  UNIQUE KEY `bil_tahun` (`bil_tahun`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `cms_tahun`
--

INSERT INTO `cms_tahun` (`id_tahun`, `bil_tahun`, `kode_aktif`, `tgl_akhir`) VALUES
(1, '2013', '1', '2013-09-30'),
(2, '2014', '0', '2014-09-30');

-- --------------------------------------------------------

--
-- Table structure for table `cms_template`
--

CREATE TABLE IF NOT EXISTS `cms_template` (
  `id_template` int(11) NOT NULL AUTO_INCREMENT,
  `isi_template` varchar(300) DEFAULT NULL,
  `urutan_tampil` int(11) DEFAULT NULL,
  `kode_aktif` enum('0','1') DEFAULT NULL,
  `kode_template` char(1) DEFAULT NULL,
  `id_pengguna` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_template`),
  KEY `id_pengguna` (`id_pengguna`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `cms_template`
--

INSERT INTO `cms_template` (`id_template`, `isi_template`, `urutan_tampil`, `kode_aktif`, `kode_template`, `id_pengguna`) VALUES
(1, 'background.jpg', 1, '', '1', 1),
(2, '<div class="monitor">\r\n<table border=0 width=75% height="555" align="left">\r\n<tr align="left">\r\n<td width="55"></td>\r\n<td>', 2, '', '1', 1),
(3, '<div class=''hidden-scrollbar''>\r\n<div class=''inner''>\r\n<p align="left">\r\n<b><h3>', 3, '', '1', 1),
(4, '</h3></b>\r\n<hr>\r\n</p>\r\n<p align="justify">', 4, '', '1', 1),
(5, '</p>\r\n<p align="center">', 5, '', '1', 1),
(6, '</p>			\r\n</div>\r\n</div>\r\n</td>\r\n</tr>\r\n</table>\r\n<table width=25% align="right" bgcolor="#FFFFFF">\r\n<tr>\r\n<td>', 6, '', '1', 1),
(7, '</td>\r\n</tr>\r\n</table>', 7, '', '1', 1),
(8, 'background_2.jpg', 1, '0', '2', NULL),
(9, '<div class="monitor2">\r\n<table border=0 width=75% height="555" align="right">\r\n<tr align="right">\r\n<td>', 2, '0', '2', NULL),
(10, '<div class=''hidden-scrollbar2''>\r\n<div class=''inner2''>\r\n<p align="left">\r\n<b><h3>', 3, '0', '2', NULL),
(11, '</h3></b>\r\n<hr>\r\n</p>\r\n<p align="justify">', 4, '0', '2', NULL),
(12, '</p>\r\n<p align="center">', 5, '0', '2', NULL),
(13, '</p>			\r\n</div>\r\n</div>\r\n</td>\r\n<td width="55"></td>\r\n</tr>\r\n</table>\r\n<table width=25% align="left" bgcolor="#FFFFFF">\r\n<tr>\r\n<td>', 6, '0', '2', NULL),
(14, '</td>\r\n</tr>\r\n</table>', 7, '0', '2', NULL),
(15, '</p>\r\n<p align="left">', 8, '', '1', 1),
(16, '</p>\r\n<p align="left">', 8, '0', '2', NULL),
(17, '<b><h3>', 9, '', '1', 1),
(18, '<b><h3>', 9, '0', '2', NULL),
(19, '</h3></b>\r\n<hr>\r\n</p>\r\n<p align="justify">', 10, '', '1', 1),
(20, '</h3></b>\r\n<hr>\r\n</p>\r\n<p align="justify">', 10, '0', '2', NULL),
(21, '<table cellpadding="5">\r\n<tr>\r\n<td>', 11, '', '1', 1),
(22, '<table cellpadding="5">\r\n<tr>\r\n<td>', 11, '0', '2', NULL),
(23, '</td>\r\n</tr>\r\n</table>', 12, '', '1', 1),
(24, '</td>\r\n</tr>\r\n</table>', 12, '0', '2', NULL),
(25, '</h3></b>\r\n<hr>\r\n</p>\r\n<div id="content">\r\n<div id="left-side">\r\n<div id="profile">\r\n<div class="tampil_info"></div>\r\n<br /><br />', 13, '', '1', 1),
(26, '</h3></b>\r\n<hr>\r\n</p>\r\n<div id="content">\r\n<div id="left-side">\r\n<div id="profile">\r\n<div class="tampil_info"></div>\r\n<br /><br />', 13, '0', '2', NULL),
(27, '<br>\r\n</div>\r\n</div>	\r\n<div class="i-clear"></div>\r\n</div>\r\n</div>\r\n</div>', 14, '', '1', 1),
(28, '<br>\r\n</div>\r\n</div>	\r\n<div class="i-clear"></div>\r\n</div>\r\n</div>\r\n</div>\r\n<td width=50></td>', 14, '0', '2', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `kuesioner_jawaban`
--

CREATE TABLE IF NOT EXISTS `kuesioner_jawaban` (
  `id_kuesioner_jawaban` int(11) NOT NULL AUTO_INCREMENT,
  `tgl_pengisian` date DEFAULT NULL,
  `id_kuesioner` int(11) DEFAULT NULL,
  `jawaban_kuesioner` enum('1','2','3','4','5') DEFAULT NULL,
  `id_pengguna` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_kuesioner_jawaban`),
  KEY `id_kuesioner` (`id_kuesioner`),
  KEY `id_jawaban_kuesioner` (`jawaban_kuesioner`),
  KEY `id_pengguna` (`id_pengguna`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=41 ;

--
-- Dumping data for table `kuesioner_jawaban`
--

INSERT INTO `kuesioner_jawaban` (`id_kuesioner_jawaban`, `tgl_pengisian`, `id_kuesioner`, `jawaban_kuesioner`, `id_pengguna`) VALUES
(1, '2014-05-24', 2, '3', 5),
(2, '2014-05-24', 1, '3', 5),
(3, '2014-05-24', 3, '2', 5),
(4, '2014-05-24', 4, '2', 5),
(5, '2014-05-24', 5, '3', 5),
(6, '2014-05-24', 6, '3', 5),
(7, '2014-05-24', 7, '3', 5),
(8, '2014-05-24', 8, '1', 5),
(9, '2014-05-24', 9, '1', 5),
(10, '2014-05-24', 10, '1', 5),
(11, '2014-05-24', 2, '2', 6),
(12, '2014-05-24', 1, '2', 6),
(13, '2014-05-24', 3, '1', 6),
(14, '2014-05-24', 4, '1', 6),
(15, '2014-05-24', 5, '2', 6),
(16, '2014-05-24', 6, '2', 6),
(17, '2014-05-24', 7, '4', 6),
(18, '2014-05-24', 8, '1', 6),
(19, '2014-05-24', 9, '1', 6),
(20, '2014-05-24', 10, '1', 6),
(21, '2014-06-10', 2, '4', 35),
(22, '2014-06-10', 1, '3', 35),
(23, '2014-06-10', 3, '1', 35),
(24, '2014-06-10', 4, '2', 35),
(25, '2014-06-10', 5, '3', 35),
(26, '2014-06-10', 6, '3', 35),
(27, '2014-06-10', 7, '5', 35),
(28, '2014-06-10', 8, '2', 35),
(29, '2014-06-10', 9, '1', 35),
(30, '2014-06-10', 10, '1', 35),
(31, '2014-06-11', 2, '5', 22),
(32, '2014-06-11', 1, '4', 22),
(33, '2014-06-11', 3, '2', 22),
(34, '2014-06-11', 4, '3', 22),
(35, '2014-06-11', 5, '3', 22),
(36, '2014-06-11', 6, '3', 22),
(37, '2014-06-11', 7, '5', 22),
(38, '2014-06-11', 8, '2', 22),
(39, '2014-06-11', 9, '1', 22),
(40, '2014-06-11', 10, '1', 22);

-- --------------------------------------------------------

--
-- Table structure for table `reviewer_bidang_kajian`
--

CREATE TABLE IF NOT EXISTS `reviewer_bidang_kajian` (
  `id_reviewer_bidang_kajian` int(11) NOT NULL AUTO_INCREMENT,
  `id_bidang_kajian` int(11) DEFAULT NULL,
  `id_pengguna` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_reviewer_bidang_kajian`),
  KEY `id_bidang_kajian` (`id_bidang_kajian`),
  KEY `id_reviewer` (`id_pengguna`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `reviewer_bidang_kajian`
--

INSERT INTO `reviewer_bidang_kajian` (`id_reviewer_bidang_kajian`, `id_bidang_kajian`, `id_pengguna`) VALUES
(1, 34, 8),
(2, 3, 9),
(3, 4, 9),
(4, 17, 8),
(5, 2, 10),
(6, 11, 10),
(7, 14, 8),
(9, 13, 11),
(10, 24, 11);

-- --------------------------------------------------------

--
-- Table structure for table `review_abstrak`
--

CREATE TABLE IF NOT EXISTS `review_abstrak` (
  `id_review_abstrak` int(11) NOT NULL AUTO_INCREMENT,
  `id_pengguna` int(11) DEFAULT NULL,
  `id_abstrak` char(5) DEFAULT NULL,
  PRIMARY KEY (`id_review_abstrak`),
  KEY `id_pengguna` (`id_pengguna`),
  KEY `id_abstrak` (`id_abstrak`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `review_abstrak`
--

INSERT INTO `review_abstrak` (`id_review_abstrak`, `id_pengguna`, `id_abstrak`) VALUES
(1, 9, 'A0002'),
(2, 9, 'A0003'),
(3, 9, 'A0005'),
(4, 10, 'A0004'),
(5, 10, 'A0007'),
(6, 10, 'A0011'),
(7, 9, 'A0019'),
(8, 9, 'A0020'),
(9, 8, 'A0008'),
(10, 8, 'A0009'),
(11, 9, 'A0016');

-- --------------------------------------------------------

--
-- Table structure for table `review_paper`
--

CREATE TABLE IF NOT EXISTS `review_paper` (
  `id_review_paper` int(11) NOT NULL AUTO_INCREMENT,
  `id_pengguna` int(11) DEFAULT NULL,
  `id_paper` char(5) DEFAULT NULL,
  PRIMARY KEY (`id_review_paper`),
  KEY `id_pengguna` (`id_pengguna`),
  KEY `id_paper` (`id_paper`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `review_paper`
--

INSERT INTO `review_paper` (`id_review_paper`, `id_pengguna`, `id_paper`) VALUES
(1, 9, 'P0001'),
(2, 9, 'P0002'),
(3, 9, 'P0003'),
(4, 8, 'P0006'),
(5, 10, 'P0005');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cms_abstrak`
--
ALTER TABLE `cms_abstrak`
  ADD CONSTRAINT `cms_abstrak_ibfk_1` FOREIGN KEY (`id_bidang_kajian`) REFERENCES `cms_bidang_kajian` (`id_bidang_kajian`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `cms_abstrak_ibfk_4` FOREIGN KEY (`id_pengguna`) REFERENCES `cms_peserta` (`id_pengguna`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cms_admin`
--
ALTER TABLE `cms_admin`
  ADD CONSTRAINT `cms_admin_ibfk_2` FOREIGN KEY (`id_pengguna`) REFERENCES `cms_pengguna` (`id_pengguna`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cms_brosur_template`
--
ALTER TABLE `cms_brosur_template`
  ADD CONSTRAINT `cms_brosur_template_ibfk_1` FOREIGN KEY (`id_pengguna`) REFERENCES `cms_admin` (`id_pengguna`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `cms_bulan`
--
ALTER TABLE `cms_bulan`
  ADD CONSTRAINT `cms_bulan_ibfk_1` FOREIGN KEY (`id_pengguna`) REFERENCES `cms_admin` (`id_pengguna`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `cms_footer`
--
ALTER TABLE `cms_footer`
  ADD CONSTRAINT `cms_footer_ibfk_1` FOREIGN KEY (`id_tahun`) REFERENCES `cms_tahun` (`id_tahun`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `cms_footer_ibfk_2` FOREIGN KEY (`id_pengguna`) REFERENCES `cms_admin` (`id_pengguna`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `cms_google_maps`
--
ALTER TABLE `cms_google_maps`
  ADD CONSTRAINT `cms_google_maps_ibfk_1` FOREIGN KEY (`id_pengguna`) REFERENCES `cms_admin` (`id_pengguna`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `cms_header`
--
ALTER TABLE `cms_header`
  ADD CONSTRAINT `cms_header_ibfk_1` FOREIGN KEY (`id_tahun`) REFERENCES `cms_tahun` (`id_tahun`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `cms_header_ibfk_2` FOREIGN KEY (`id_pengguna`) REFERENCES `cms_admin` (`id_pengguna`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `cms_jadwal`
--
ALTER TABLE `cms_jadwal`
  ADD CONSTRAINT `cms_jadwal_ibfk_2` FOREIGN KEY (`id_paper`) REFERENCES `cms_paper` (`id_paper`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `cms_kuesioner`
--
ALTER TABLE `cms_kuesioner`
  ADD CONSTRAINT `cms_kuesioner_ibfk_3` FOREIGN KEY (`id_urutan_pertanyaan`) REFERENCES `cms_order_urutan` (`id_order_urutan`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `cms_kuesioner_ibfk_4` FOREIGN KEY (`id_tahun`) REFERENCES `cms_tahun` (`id_tahun`) ON UPDATE CASCADE;

--
-- Constraints for table `cms_menu`
--
ALTER TABLE `cms_menu`
  ADD CONSTRAINT `cms_menu_ibfk_1` FOREIGN KEY (`id_order_urutan`) REFERENCES `cms_order_urutan` (`id_order_urutan`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `cms_menu_ibfk_2` FOREIGN KEY (`id_pengguna`) REFERENCES `cms_admin` (`id_pengguna`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `cms_panitia`
--
ALTER TABLE `cms_panitia`
  ADD CONSTRAINT `cms_panitia_ibfk_2` FOREIGN KEY (`id_pengguna`) REFERENCES `cms_pengguna` (`id_pengguna`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cms_paper`
--
ALTER TABLE `cms_paper`
  ADD CONSTRAINT `cms_paper_ibfk_1` FOREIGN KEY (`id_abstrak`) REFERENCES `cms_abstrak` (`id_abstrak`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cms_penulis`
--
ALTER TABLE `cms_penulis`
  ADD CONSTRAINT `cms_penulis_ibfk_1` FOREIGN KEY (`id_abstrak`) REFERENCES `cms_abstrak` (`id_abstrak`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cms_peserta`
--
ALTER TABLE `cms_peserta`
  ADD CONSTRAINT `cms_peserta_ibfk_6` FOREIGN KEY (`id_pengguna`) REFERENCES `cms_pengguna` (`id_pengguna`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cms_peserta_ibfk_7` FOREIGN KEY (`id_tahun`) REFERENCES `cms_tahun` (`id_tahun`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `cms_pimpinan`
--
ALTER TABLE `cms_pimpinan`
  ADD CONSTRAINT `cms_pimpinan_ibfk_2` FOREIGN KEY (`id_pengguna`) REFERENCES `cms_pengguna` (`id_pengguna`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cms_postingan`
--
ALTER TABLE `cms_postingan`
  ADD CONSTRAINT `cms_postingan_ibfk_3` FOREIGN KEY (`id_pengguna`) REFERENCES `cms_admin` (`id_pengguna`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `cms_reviewer`
--
ALTER TABLE `cms_reviewer`
  ADD CONSTRAINT `cms_reviewer_ibfk_1` FOREIGN KEY (`id_pengguna`) REFERENCES `cms_pengguna` (`id_pengguna`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cms_riwayat_menu`
--
ALTER TABLE `cms_riwayat_menu`
  ADD CONSTRAINT `cms_riwayat_menu_ibfk_1` FOREIGN KEY (`id_menu`) REFERENCES `cms_menu` (`id_menu`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cms_scan_transfer`
--
ALTER TABLE `cms_scan_transfer`
  ADD CONSTRAINT `cms_scan_transfer_ibfk_4` FOREIGN KEY (`id_pengguna`) REFERENCES `cms_peserta` (`id_pengguna`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `cms_stempel_ttd`
--
ALTER TABLE `cms_stempel_ttd`
  ADD CONSTRAINT `cms_stempel_ttd_ibfk_1` FOREIGN KEY (`id_pengguna`) REFERENCES `cms_panitia` (`id_pengguna`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `cms_template`
--
ALTER TABLE `cms_template`
  ADD CONSTRAINT `cms_template_ibfk_1` FOREIGN KEY (`id_pengguna`) REFERENCES `cms_admin` (`id_pengguna`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `kuesioner_jawaban`
--
ALTER TABLE `kuesioner_jawaban`
  ADD CONSTRAINT `kuesioner_jawaban_ibfk_5` FOREIGN KEY (`id_kuesioner`) REFERENCES `cms_kuesioner` (`id_kuesioner`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `kuesioner_jawaban_ibfk_7` FOREIGN KEY (`id_pengguna`) REFERENCES `cms_peserta` (`id_pengguna`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `reviewer_bidang_kajian`
--
ALTER TABLE `reviewer_bidang_kajian`
  ADD CONSTRAINT `reviewer_bidang_kajian_ibfk_2` FOREIGN KEY (`id_pengguna`) REFERENCES `cms_reviewer` (`id_pengguna`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reviewer_bidang_kajian_ibfk_3` FOREIGN KEY (`id_bidang_kajian`) REFERENCES `cms_bidang_kajian` (`id_bidang_kajian`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `review_abstrak`
--
ALTER TABLE `review_abstrak`
  ADD CONSTRAINT `review_abstrak_ibfk_3` FOREIGN KEY (`id_pengguna`) REFERENCES `cms_reviewer` (`id_pengguna`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `review_abstrak_ibfk_4` FOREIGN KEY (`id_abstrak`) REFERENCES `cms_abstrak` (`id_abstrak`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `review_paper`
--
ALTER TABLE `review_paper`
  ADD CONSTRAINT `review_paper_ibfk_3` FOREIGN KEY (`id_pengguna`) REFERENCES `cms_reviewer` (`id_pengguna`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `review_paper_ibfk_4` FOREIGN KEY (`id_paper`) REFERENCES `cms_paper` (`id_paper`) ON DELETE SET NULL ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
