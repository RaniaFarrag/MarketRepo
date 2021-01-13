<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en" dir="rtl">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>{{ trans('dashboard.Agreement') }} </title>
    <style>
        @page {
            margin: 110px 20px;
            header: page-header;
            footer: page-footer;
        }

        body {
            font-size: 13px;
            letter-spacing: 0px;
            background: #2196f3;
            text-align: right;
            font-family: 'examplefont3', sans-serif;
        }

        main {
            height: 870px;
            position: relative;
            display: block;
        }

        .ar {
            font-family: 'examplefont', sans-serif;
        }

        .en {
            font-family: 'examplefont2', sans-serif;
            direction: ltr;
        }

        td {
            padding: 2px 5px;
            text-align: center;
            border: 2px solid #0c0e1a;
            border-collapse: collapse;
            font-size: 12px !important;
        }

        .ltr {
            direction: ltr;
            text-align: left
        }

        h4 {
            font-size: 24px;
        }

        h5 {
            font-size: 18px
        }

        table {
            width: 100% !important;
            border-collapse: collapse;
            /*  border: 1px solid #77697a*/
        }

        .page_break {
            page-break-before: always;
        }

        p {
            font-size: 14px
        }

        header {
            position: absolute;
            top: 0cm;
            left: 0cm;
            right: 0cm;
            text-align: center;
            width: 100%;
            height: 2cm;
        }

        footer {
            position: absolute;
            bottom: 0cm;
            left: 0cm;
            right: 0cm;
            text-align: center;
            width: 100%;
        }

        .rtl {
            direction: rtl;
            text-align: right;
        }
    </style>

</head>


<body dir="rtl">

<htmlpageheader name="page-header">
    <header><img style="width: 100%" src="{{ asset('dashboard/assets/head.jpg') }} "></header>
</htmlpageheader>

<htmlpagefooter name="page-footer">
    <footer><img style="width: 100%" src="{{ asset('dashboard/assets/foot.jpg') }}"></footer>
</htmlpagefooter>


<main>
    <h3 style="text-align: center;font-size: 18px;">عقد توظيف كوادر</h3>
    <h3 class="en" style="text-align: center">Recruitment Service Agreement</h3>
    <table class="ltr">

        <tbody>
        <tr>
            <td class="ltr" style="font-weight: bold">THIS CONTRACT IS ENTERED INTO ON  {{ $linrco_agreement->date }}  AND BETWEEN : </td>
        </tr>
        </tbody>
    </table>
    <br>
    <table class="ltr" style="line-height: 22px;">

        <tbody>

        <tr>
            <td class="ltr" style="width: 45%; font-weight: bold" colspan="2">FIRST PARTY</td>
            <td class="ltr" style="width: 10%;border: none;" colspan="1"></td>
            <td class="ltr" style="width: 45%;font-weight: bold" colspan="2">SECOND PARTY</td>
        </tr>
        <tr>
            <td class="ltr" colspan="1">Name</td>
            <td class="ltr" colspan="1"><strong>LINRCO</strong></td>
            <td class="ltr" style="width: 10%;border: none;"></td>
            <td class="ltr" colspan="1">Name</td>
            <td class="ltr" colspan="1"><strong>{{ $linrco_agreement->company->name }}</strong></td>
        </tr>
        <tr>
            <td class="ltr" colspan="1">CR NUMBER</td>
            <td class="ltr" colspan="1">1010589658</td>
            <td class="ltr" style="width: 10%; border: none;"></td>
            <td class="ltr" colspan="1">CR NUMBER</td>
            <td class="ltr" colspan="1">{{ $linrco_agreement->cr }}</td>
        </tr>
        <tr>
            <td class="ltr" colspan="1">Address</td>
            <td class="ltr" colspan="1">Omar Bin Abdulaziz Street Al-Malaz District</td>
            <td class="ltr" style="width: 10%;direction: ltr; border: none;"></td>
            <td class="ltr" colspan="1">Address</td>
            <td class="ltr" colspan="1">{{ $linrco_agreement->company->district ? $linrco_agreement->company->district : '-'}}</td>
        </tr>
        <tr>
            <td class="ltr" colspan="1">CITY</td>
            <td class="ltr" colspan="1">Riyadh</td>
            <td class="ltr" style="width: 10%;border: none;"></td>
            <td class="ltr" colspan="1">CITY</td>
            <td class="ltr" colspan="1">{{ $linrco_agreement->company->city ?  $linrco_agreement->company->city->translate('en')->name : '-' }}</td>
        </tr>
        <tr>
            <td class="ltr" colspan="1">P.O Box</td>
            <td class="ltr" colspan="1">32545</td>
            <td class="ltr" style="width: 10%;border: none;"></td>
            <td class="ltr" colspan="1">P.O Box</td>
            <td class="ltr" colspan="1">{{ $linrco_agreement->mail_box }}</td>
        </tr>
        <tr>
            <td class="ltr" colspan="1">POSTAL CODE</td>
            <td class="ltr" colspan="1">11371</td>
            <td class="ltr" style="width: 10%;border: none;"></td>
            <td class="ltr" colspan="1">POSTAL CODE</td>
            <td class="ltr" colspan="1">{{ $linrco_agreement->postal_code }}</td>
        </tr>
        <tr>
            <td class="ltr" colspan="1">PH. NO.</td>
            <td class="ltr" colspan="1">114764587</td>
            <td class="ltr" style="width: 10%;border: none;"></td>
            <td class="ltr" colspan="1">PH. NO.</td>
            <td class="ltr" colspan="1">{{ $linrco_agreement->phone }}</td>
        </tr>
        <tr>
            <td class="ltr" colspan="1">Email</td>
            <td class="ltr" colspan="1">{{ $linrco_agreement->linrco_email }}</td>
            <td class="ltr" style="width: 10%;border: none;"></td>
            <td class="ltr" colspan="1">Email</td>
            <td class="ltr" colspan="1">{{ $linrco_agreement->email }}</td>
        </tr>
        <tr>
            <td class="ltr" style="border-bottom: none" colspan="2">REPRESENTED BY :</td>
            <td class="ltr" style="width: 10%;border: none;"></td>
            <td class="ltr" style="border-bottom: none" colspan="2">REPRESENTED BY :</td>
        </tr>
        <tr>
            <td class="ltr" style="border-top: none" colspan="2">AYED TURKY ALI</td>
            <td class="ltr" style="width: 10%;border: none;"></td>
            <td class="ltr" style="border-top: none" colspan="2">{{ $linrco_agreement->company_representative }}</td>
        </tr>


        </tbody>
    </table>
    <br>
    <table>

        <tbody>
        <tr>
            <td class="rtl"><strong>تم ابرام هذا العقد في تاريخ {{ $linrco_agreement->date }} فيما بين كل من:</strong></td>
        </tr>
        </tbody>
    </table>
    <br>
    <table style="line-height: 22px;">

        <tbody>

        <tr>
            <td class="rtl" style="width: 45%;" colspan="2"><strong>الطرف الأول</strong></td>
            <td class="rtl" style="width: 10%; border: none;" colspan="1"></td>
            <td class="rtl" style="width: 45%;" colspan="2"><strong>الطرف الثاني</strong></td>
        </tr>
        <tr>
            <td class="rtl" colspan="1">اسم الشركة</td>
            <td class="rtl" colspan="1"><strong>شركة ليناركو للتوظيف</strong></td>
            <td class="rtl" style="width: 10%;border: none;"></td>
            <td class="rtl" colspan="1">اسم الشركة</td>
            <td class="rtl" colspan="1"><strong>{{ $linrco_agreement->company->translate('ar')->name }}</strong></td>
        </tr>
        <tr>
            <td class="rtl" colspan="1">رقم السجل</td>
            <td class="rtl" colspan="1">1010589658</td>
            <td class="rtl" style="width: 10%;border: none;"></td>
            <td class="rtl" colspan="1">رقم السجل</td>
            <td class="rtl" colspan="1">{{ $linrco_agreement->cr }}</td>
        </tr>
        <tr>
            <td class="rtl" colspan="1">العنوان</td>
            <td class="rtl" colspan="1">شارع عمر بن عبدالعزيز – حي الملز</td>
            <td class="rtl" style="width: 10%;border: none;"></td>
            <td class="rtl" colspan="1">العنوان</td>
            <td class="rtl" colspan="1">{{ $linrco_agreement->company->district ? $linrco_agreement->company->district : '-'}}</td>
        </tr>
        <tr>
            <td class="rtl" colspan="1">المدينة</td>
            <td class="rtl" colspan="1">الرياض</td>
            <td class="rtl" style="width: 10%;border: none;"></td>
            <td class="rtl" colspan="1">المدينة</td>
            <td class="rtl" colspan="1">{{ $linrco_agreement->company->city ? $linrco_agreement->company->city->translate('ar')->name : '-' }}</td>
        </tr>
        <tr>
            <td class="rtl" colspan="1">ص. ب</td>
            <td class="rtl" colspan="1">32545</td>
            <td class="rtl" style="width: 10%;border: none;"></td>
            <td class="rtl" colspan="1">ص. ب</td>
            <td class="rtl" colspan="1">{{ $linrco_agreement->mail_box }}</td>
        </tr>
        <tr>
            <td class="rtl" colspan="1">الرمز البريدي</td>
            <td class="rtl" colspan="1">11371</td>
            <td class="rtl" style="width: 10%;border: none;"></td>
            <td class="rtl" colspan="1">الرمز البريدي</td>
            <td class="rtl" colspan="1">{{ $linrco_agreement->postal_code }}</td>
        </tr>
        <tr>
            <td class="rtl" colspan="1">هاتف</td>
            <td class="rtl" colspan="1">114764587</td>
            <td class="rtl" style="width: 10%;border: none;"></td>
            <td class="rtl" colspan="1">هاتف</td>
            <td class="rtl" colspan="1">{{ $linrco_agreement->phone }}</td>
        </tr>
        <tr>
            <td class="rtl" colspan="1">البريد الالكتروني</td>
            <td class="rtl" colspan="1">{{ $linrco_agreement->linrco_email }}</td>
            <td class="rtl" style="width: 10%;border: none;"></td>
            <td class="rtl" colspan="1">البريد الالكتروني</td>
            <td class="rtl" colspan="1">{{ $linrco_agreement->email }}</td>
        </tr>
        <tr>
            <td class="rtl" style="border-bottom: none" colspan="2">الممثل عن الشركة في هذا العقد :</td>
            <td class="rtl" style="width: 10%;border: none;"></td>
            <td class="rtl" style="border-bottom: none" colspan="2">الممثل عن الشركة في هذا العقد :</td>
        </tr>
        <tr>
            <td class="rtl" style="border-top: none" colspan="2">عايض تركي علي</td>
            <td class="rtl" style="width: 10%;border: none;"></td>
            <td class="rtl" style="border-top: none" colspan="2">{{ $linrco_agreement->company_representative }}</td>
        </tr>


        </tbody>

    </table>


</main>

<main>
    <table style="line-height: 22px; vertical-align: top">

        <tbody>

        <tr>
            <td class="rtl" style="width: 50%;">
                <strong> 1) مسؤوليات الطرف الأول:</strong>
            </td>
            <td class="ltr" style="width: 50%;">
                <strong> 1) RESPONSIBILITIES OF THE FIRST PARTY:</strong>

            </td>
        </tr>
        <tr>
            <td class="rtl" style="width: 50%;line-height: 24px"><strong>1.1</strong>
                يتعين على الطرف الأول إجراء فحص ومسح شامل للمرشحين والتحقق من
                مؤهلاتهم وتاريخهم الوظيفي والمراجع حسب الحاجة. ويقوم الطرف الأول بتحويل وإرسال المرشحين فقط الذين
                يستوفون الحد الأدنى من المتطلبات التي حددها الطرف الثاني.
            </td>
            <td class="ltr" style="width: 50%;line-height: 24px"><strong>1.1</strong> First party shall conduct a thorough screening of
                candidates,
                verify their qualifications, employment history and reference as appropriate. First party shall only
                forward candidates who meet the minimum requirements set forth by the Second party.
            </td>
        </tr>
        <tr>
            <td class="rtl" style="width: 50%;line-height: 30px"><strong>1.2</strong>
                يتخذ الطرف الأول الترتيبات اللازمة للمرشحين الذين يحضرون المقابلة بمجرد استلام قائمة مختصرة بالمرشحين
                المقبولين من الطرف الثاني وتأكيد مواعيد ومكان المقابلة، إن أمكن
            </td>
            <td class="ltr" style="width: 50%;"><strong>1.2</strong>
                First party shall make necessary arrangements for the candidates attending the interview once a
                shortlist of candidates has been received from the Second party and confirming the dates and venue of
                the interview , if applicable.
            </td>
        </tr>
        <tr>
            <td class="rtl" style="width: 50%;line-height: 35px"><strong> 1.3</strong>
                يتخذ الطرف الأول الترتيبات اللازمة لممثلي الطرف الثاني لضمان إنجاز سلس وفعال لعملية المقابلة. يشمل هذا
                إن أمكن تلك الاجراءات <br>
                (أ) ترتيب الحجوزات الفندقية. مع تحمل الطرف الثاني كامل التكلفة<br>
                (ب). ترتيب النقل من المطار إلى الفندق والعكس.<br>
                (ج). ترتيب المواصلات من الفندق لمكان المقابلة والعكس<br>
                (د). توفير أماكن مناسبة لاجراء المقابلات.

            </td>
            <td class="ltr" style="width: 50%;">
                <strong> 1.3</strong> First party shall make the necessary arrangements for the Second party’s
                representatives to ensure
                smooth and efficient accomplishment for the interview process. If applicable these will include:<br>
                (a). Arrangement of hotel reservations. (Cost will be borne by the Second party)<br>
                (b). Arrangement of transportation from the airport to the hotel & vice versa<br>
                (c). Arrangement of transportation from the hotel to the interview facility & vice versa<br>
                (d). Provision of suitable and acceptable interview facilities.<br>
            </td>
        </tr>
        <tr>
            <td class="rtl" style="width: 50%;line-height: 35px"><strong> 1.4</strong>
                يتخذ الطرف الأول الترتيبات اللازمة لممثلي الطرف الثاني لضمان إنجاز سلس وفعال لعملية المقابلة. يشمل هذا
                إن أمكن تلك الاجراءات <br>
                <strong>(أ)</strong>
                ترتيب الحجوزات الفندقية. مع تحمل الطرف الثاني كامل التكلفة<br>
                <strong>(ب)</strong>. ترتيب النقل من المطار إلى الفندق والعكس.<br>
                <strong>(ج)</strong>. ترتيب المواصلات من الفندق لمكان المقابلة والعكس<br>
                <strong>(د)</strong>. توفير أماكن مناسبة لاجراء المقابلات.

            </td>
            <td class="ltr" style="width: 50%;">
                <strong> 1.4</strong> First party shall make the necessary arrangements for the Second party’s
                representatives to ensure
                smooth and efficient accomplishment for the interview process. If applicable these will include:<br>
                <strong>(a)</strong>. Arrangement of hotel reservations. (Cost will be borne by the Second party)<br>
                <strong>(b)</strong>. Arrangement of transportation from the airport to the hotel & vice versa<br>
                <strong>(c)</strong>. Arrangement of transportation from the hotel to the interview facility & vice
                versa<br>
                <strong>(d)</strong>. Provision of suitable and acceptable interview facilities.<br>
            </td>
        </tr>




        <tr>
            <td class="rtl" style="width: 50%; line-height: 26px;"><strong> 1.5</strong>
                يقوم الطرف الأول بمراعاة الدقة في ترشيح واختيار المرشحين واتباع الأساليب المنهجية لذلك واتباع تعليمات
                <strong>السفارات السعودية</strong>
                في الخارج فيما يتعلق بالفحص الطبي المطلوب والمتطلبات الأخرى على النحو التالي: <br>
                <strong>(أ)</strong> يجب أن يكون كل مرشح لائقاً طبياً وليس به عيوب أو تشوهات قد تعيق عمله.


            </td>
            <td class="ltr" style="width: 50%;">
                <strong> 1.5</strong>
                . The First party is obliged to be accurate in the nomination and selection of candidates, to follow the
                systematic methods for that and to follow the instructions of the<strong> SAUDI EMBASSIES</strong> abroad in connection
                with the medical examination required and other requirements as follows: <br>
                <strong>(a)</strong>. Each candidate shall be medically fit and have no defects or deformities which may
                hinder his work.


            </td>
        </tr>



        <tr>
            <td class="rtl" style="width: 50%;line-height: 28px;">
                <strong>(ب)</strong> يتم اختيار كل مرشح بناءً على الوصف الوظيفي الذي يرسله الطرف الثاني. <br>
                <strong>(ج)</strong> يجب أن يستوفي كل مرشح الميزات التي تتطلبها كل مهنة. <br>
                <strong>(د)</strong> بالنسبة للوظائف الفنية (يجب على المرشح تقديم الشهادات التعليمية وشهادات الخبرة
                وشهادة الاختبارات
                المهنية (MOT). <br>
                <strong>(هـ)</strong> يجب أن يكون كل مرشح على دراية بوظيفته بناء علي الوصف الوظيفي المرسل من الطرف
                الثاني. <br>
                <strong>(و)</strong> يجب على كل مرشح تقديم مستنداته بما في ذلك الشهادات التعليمية وشهادات الخبرة الأصلية
                ليتم مراجعتها
                أثناء المقابلات، كما يجب عليه إحضار هذه الشهادات معه إلى المملكة العربية السعودية بعد اعتمادها من قبل.
                السفارة السعودية.


            </td>
            <td class="ltr" style="width: 50%;">
                
                <strong>(b)</strong>. Each candidate shall be selected as per the professional request sent by the
                Second party. <br>
                <strong>(c)</strong>. Each candidate shall meet the features required by each profession. <br>
                <strong>(d)</strong>. As for the technical jobs (the candidate shall provide educational certificates,
                certificates of
                experience and MOT certificate). <br>
                <strong>(e)</strong>. Each candidate shall be aware of his/her job based on the job description set by
                the Seocnd party. <br>
                <strong>(f)</strong>. Each candidate shall provide his/her documents including educational certificates
                and authentic
                experience certificates to be reviewed during the interviews, he/she shall also bring these certificates
                with him/her to Saudi Arabia after being approved by the SAUDI EMBASSIES.


            </td>
        </tr>
        <tr>
            <td class="rtl" style="width: 50%;"><strong> 1.6</strong>
                تزويد الطرف الثاني بتقرير عن حالة التوظيف وتقرير التعيين ومتابعات المقابلات التي تغطي جميع جوانب عملية
                التوظيف المعلقة حتى الآن.

            </td>
            <td class="ltr" style="width: 50%;">
                <strong> 1.6</strong>
                . Providing the Second party a weekly Recruitment Status Report, Deployment Report, Interview Trackers
                covering all the aspects of the outstanding recruitment process to date.


            </td>
        </tr>
        <tr>
            <td class="rtl" style="width: 50%;"><strong> 1.7</strong>
                يجب أن يقدم الطرف الأول إرشادات توجيهية قبل المغادرة للمرشحين المختارين موضحًا المبادئ والمعايير
                الأساسية التي يجب اتباعها خلال فترة عملهم مع الطرف الثاني ولضمان فهمهم وموافقتهم. تتعلق هذه المبادئ
                التوجيهية الأساسية بقانون العمل السعودي ، والعادات ، والدين ، والثقافة ، والتقاليد ، والمناطق الجغرافية
                المحلية ، إلخ في المملكة العربية السعودية.

            </td>
            <td class="ltr" style="width: 50%;">
                <strong> 1.7</strong>
                First party shall provide a pre-departure orientation for the selected candidates explaining the basic
                guidelines to be followed during their tenure with the Second party and to ensure their understanding
                and acceptance. These basic guidelines pertain to Saudi Labor Law, Customs, Religion, Culture,
                Traditions, Local Geographical territories etc. of SAUDI ARABIA.


            </td>
        </tr>
        <tr>
            <td class="rtl" style="width: 50%;line-height: 26px;"><strong> 1.8</strong>
                يلتزم الطرف الأول بالتأكيد على المرشحين المعينين من جانبهم بالتوقيع على ما هو ضروري لتمكين الطرف الثاني
                في أي وقت من نقل أو تعيين الموظفين من موقع إلى آخر حسب الحاجة للعمل بعد أخذ موافقتهم الخطية دون تغيير
                المهن أو الرواتب التي استقدموا لها.
            </td>
            <td class="ltr" style="width: 50%;">
                <strong> 1.8</strong>
                The First party is binding to emphasize on the candidates recruited by them and to make them sign what
                is necessary to enable the Second party at any time to transfer or assign the staff from one location to
                another as needed for work after take their written approval without changing the professions or
                salaries for which they were recruited.

            </td>
        </tr>
        <tr>
            <td class="rtl" style="width: 50%;">
                <strong> 2) مسؤوليات الطرف الثاني:</strong>
            </td>
            <td class="ltr" style="width: 50%;">
                <strong> 2) RESPONSIBILITIES OF THE SECOND PARTY: </strong>

            </td>
        </tr>


        <tr>
            <td class="rtl" style="width: 50%;line-height: 21px;"><strong> 2.1</strong>
                يجب على الطرف الثاني تزويد الطرف الأول بجميع المستندات اللازمة للتسجيل في المكاتب الخارجية المعنية في
                المملكة العربية السعودية. وهذه الوثائق هي على النحو التالي<br>
                <strong>(أ)</strong>. التفويض<br>
                <strong>(ب)</strong>. أمر العمل (طلب التوظيف)<br>
                <strong>(ج)</strong>. عقد عمل رئيسي<br>
                <strong>(د)</strong>. شهادة تسجيل الشركة<br>
                <strong>(ه)</strong>. نسخة التأشيرة<br>
                <strong>(و)</strong>. بطاقة الهوية للشخص الموقع

            </td>
            <td class="ltr" style="width: 50%; line-height: 19px;">
                <strong> 2.1</strong>
                . The Second party shall provide the First party with all the necessary documents for registration with
                the respective overseas offices in the KINGDOM OF SAUDI ARABIA. And those documents are as follows.<br>
                <strong>(a)</strong>. Power of Attorney<br>
                <strong>(b)</strong>. Job Order (Manpower Request)<br>
                <strong>(c)</strong>. Master Employment Contract<br>
                <strong>(d)</strong>. Company Registration Certificate<br>
                <strong>(e)</strong>. Visa Copy<br>
                <strong>(f)</strong>. ID of the Signatory


            </td>
        </tr>
        <tr>
            <td class="rtl" style="width: 50%;line-height: 28px;">
                يجب التحقق من هذه المستندات على النحو الواجب وإرسالها إلى الطرف الأول قبل البدء في أي أنشطة توظيف مع
                التزام الطرف الثاني بأن تكون جميع هذه المستندات ساريه وبها صلاحية لاتقل عن ستة أشهر من تاريخ إرسالها .

            </td>
            <td class="ltr" style="width: 50%;">

                These documents must be duly verified and to be sent to the First party before commencement of any
                recruitment activities with the commitment of the Second party that all these documents are valid and
                have a validity of not less than six months from the date of sending them.


            </td>
        </tr>
        <tr>
            <td class="rtl" style="width: 50%;line-height: 30px;"><strong> 2.2</strong>
                سيقدم الطرف الثاني متطلبات الوظيفة التفصيلية مع الوصف الوظيفي الكامل والمؤهلات المطلوبة للطرف الأول
            </td>
            <td class="ltr" style="width: 50%;">
                <strong> 2.2</strong>
                The Second party will provide the detailed job requirements along with their full job description and
                needed qualifications to the First party.


            </td>
        </tr>
        <tr>
            <td class="rtl" style="width: 50%;"><strong>2.3</strong>
                يجب أن يمنح الطرف الثاني مهلة لا تقل عن 21 يوم عمل عند إصدار أمر العمل.
            </td>
            <td class="ltr" style="width: 50%;">
                <strong>2.3</strong>
                The Second party shall give at least 21 working days lead-time when issuing a job order.
            </td>
        </tr>
        <tr>
            <td class="rtl" style="width: 50%;"><strong>2.4</strong>
                يجب على الطرف الثاني تقديم نتائج المقابلات في غضون خمسة أيام من انتهاء المقابلة.
            </td>
            <td class="ltr" style="width: 50%;">
                <strong>2.4</strong>
                The Second party shall provide the results within 5 days upon conclusion of the interview.
            </td>
        </tr>
        <tr>
            <td class="rtl" style="width: 50%;line-height: 28px;"><strong>2.5</strong>
                يلتزم ويتعهد الطرف الثاني بأنه لن يتم نقل العامل أو إعادة تعيينه إلى أي من الشركات التابعة له أو أي طرف
                ثالث في أي وقت خلال مدة العقد إلا بعد الحصول علي موافقة كتابية من العامل و الطرف الاول .
            </td>
            <td class="ltr" style="width: 50%;">
                <strong>2.5</strong>
                The Second party is obligated and pledges that the worker will not be transferred or re-appointed to any
                of his subsidiaries or any third party at any time during the contract term except after obtaining
                written consent from the worker and the First party
            </td>
        </tr>
        <tr>
            <td class="rtl" style="width: 50%;line-height: 28px;"><strong>2.6</strong>
                إذا كان هناك أي إجراء تجاه العامل بما في ذلك على سبيل المثال لا الحصر الاستقالة وانهاء الخدمة و
                الاعادة لبلده، يجب على الطرف الثاني إخطار الطرف الأول من خلال إشعار خطي رسمي في المقام الأول وقبل إتخاذ
                أي إجراء مع العامل
            </td>
            <td class="ltr" style="width: 50%;">
                <strong>2.6</strong>
                Should there be any action towards the worker including but not limited to resignation, termination and
                repatriation, The Second party shall notify the First party through an official written notice at the
                first instance, before taking any action with the worker.
            </td>
        </tr>
        <tr>
            <td class="rtl" style="width: 50%;line-height: 35px;"><strong>2.7</strong>
                يقر الطرف الثاني ويتعهد بأنه سيلتزم بشروط وأحكام وبنود عقد العمل المبرم مع الموظف ، بما في ذلك على سبيل
                المثال لا الحصر الدفع الفوري للرواتب والأجور الصحيحة والمتفق عليها بين الطرفين للموظف.
            </td>
            <td class="ltr" style="width: 50%;line-height: 30px;">
                <strong>2.7</strong>
                The Second party affirms and undertakes that it will abode by the stipulations, terms and conditions of
                the employment contract executed with the employee, including but not limited to the prompt payment of
                correct and agreed salaries and wages agreed upon between the two parties to the employee.
            </td>
        </tr>
        <tr>
            <td class="rtl" style="width: 50%;"><strong>2.8</strong>
                يكون الطرف الثاني مسؤولاً عن تأكيد (إشعار التذاكر المدفوعة مسبقًا) المرسلة للمرشحين المختارين.
            </td>
            <td class="ltr" style="width: 50%;">
                <strong>2.8</strong>
                The Second party shall be responsible for the confirmation of PTA (Prepaid Ticket Advise) sent for the
                selected candidates.
            </td>
        </tr>
        <tr>
            <td class="rtl" style="width: 50%;line-height: 28px;"><strong>2.9</strong>
                يكون الطرف الثاني مسؤولاً عن فحص جميع العمال طبياً في غضون أسبوع واحد من وصولهم إلى المملكة العربية
                السعودية لتحديد اللياقة البدنية للعمل.
            </td>
            <td class="ltr" style="width: 50%;">
                <strong>2.9</strong>
                The Second party shall be responsible for having all workers medically examined within one week from
                arrival in the KINGDOM OF SAUDI ARABIA to determine physical fitness for the employment.
            </td>
        </tr>
        <tr>
            <td class="rtl" style="width: 50%;line-height: 27px;"><strong>2.10</strong>
                يكون الطرف الثاني مسؤولاً ويتحمل تكاليف الحصول على تأشيرات دخول وخروج سارية ، وتصاريح الإقامة والعمل
                المطلوبة في المملكة العربية السعودية وكافة الرسوم والتكاليف النظامية التي قد تستجد في المستقبل.
            </td>
            <td class="ltr" style="width: 50%;line-height: 27px;">
                <strong>2.10</strong>
                The second party shall be responsible for and shall shoulder the cost of securing valid entry and exit
                visas, residency and work permits required in the KINGDOM OF SAUDI ARABIA. And all legal fees and costs
                that may arise in the future.
            </td>
        </tr>
        <tr>
            <td class="rtl" style="width: 50%;">
                <strong>2.11</strong>


                يجب ان يؤكد الطرف الثاني على عدم مخالفة نظام العمل السعودي في ما يلي:<br/>
                <strong>(أ)</strong>.يتحمل الطرف الثاني تكلفة بطاقة تصريح العمل لتسجيل الهوية في المملكة العربية
                السعودية ولا يتحملها العامل بأي شكل من أشكال الخصم.<br/>
                <strong>(ب)</strong>.لا يجوز تخفيض الراتب حسب خطاب العرض الأصلي الصادر من الطرف الثاني قبل وصول العامل
                إلى المملكة العربية السعودية.<br/>
                <strong>(ج)</strong>.يجب على الطرف الثاني تحمل تذكرة العودة عند الانتهاء من مدة عقد العامل.<br/>
                <strong>(د)</strong>.يحترم الطرف الثاني ويلتزم بقانون العمل السعودي مع جميع القواعد واللوائح الخاصة به.
            </td>
            <td class="ltr" style="width: 50%;line-height: 20px">
                <strong>2.11</strong>
                . The Second party, or the employer, shall ensure that the following SAUDI LABOR LAW will not be
                violated<br/>
                <strong>(a)</strong>. Work Permit ID cost of ID registration in KINGDOM OF SAUDI ARABIA shall be
                shouldered by the Second party and not charged to the worker in any form of deduction.<br/>
                <strong>(b)</strong>. Salary shall not be reduced as per the original offer letter issued by the Second
                party prior to the arrival of the worker in the KINGDOM OF SAUDI ARABIA<br/>
                <strong>(c)</strong>. Return ticket shall be shouldered by the Second party upon completion of the
                worker’s contracted tenure.<br/>
                <strong>(d)</strong>. The Second party shall honor and respect the SAUDI LABOR LAW with its all rules
                and regulations.

            </td>
        </tr>
        <tr>
            <td class="rtl" style="width: 50%;line-height: 23px;"><strong>2.12</strong>

                مدة العقد لجميع الموظفين المعينين بموجب هذه الاتفاقية هي سنتان ، في حالة الإنهاء المبكر من قبل الطرف
                الثاني ، دون خطأ يُنسب إلى الموظف ، ففي هذه الحالة يستحق الموظف راتب شهرين أساسي كتعويض عن مخالفة العقد
                من قبل الطرف الثاني وهذا متفق عليه بين الطرفين.
            </td>
            <td class="ltr" style="width: 50%;line-height: 20px;">
                <strong>2.12</strong>
                . Contract duration for all hired employee under this agreement is 2 years, in case of premature
                termination by the Second party, without fault attributable to the employee, then in this case the
                employee shall be entitled to a 2 month basic salary as a compensation for contract violation by the
                Second party. And this is agreed upon between the two parties.

            </td>
        </tr>
        <tr>
            <td class="rtl" style="width: 50%;line-height: 35px;"><strong>2.13</strong>
                في حالة إنهاء خدمة العامل لسبب أو نتيجة وفاة أو إصابة خطيرة ، يجب على الطرف الثاني إبلاغ السفارة / ملحق
                العمل الأقرب للممثل القانوني للطرف الثاني بالحدث المذكور. في حالة وفاة العامل يتحمل الطرف الثاني مصاريف
                إعادة رفات العامل وممتلكاته الشخصية إلى أقاربه في الدولة التي يعمل بها. وإذا لم تكن الإعادة إلى الوطن
                ممكنة في ظل ظروف معينة ، فيجب التصرف المناسب بها ، بناءً على ترتيب مسبق مع أقرب أقرباء العامل ، أو في
                حالة عدم وجود هذا الأخير ، يتوجه إلى أقرب سفارة / ملحق عمل أو قنصلية. وفي جميع الأحوال يلتزم الطرف
                الثاني بالتأكد من أن المزايا المستحقة للعامل ستتاح له أو للمستفيدين منه في أقصر وقت ممكن.
            </td>
            <td class="ltr" style="width: 50%;line-height: 28px;">
                <strong>2.13</strong>
                In case of termination of worker’s employment for cause or a result of death or serious injury, the
                Second party shall immediately inform the respective Embassy/ Labor Attaché nearest the Second party
                Legal Representative about the said event. In case of death of the worker, the second party shall bear
                the expanses for the repatriation of the remains of the worker and his personal properties to his
                relatives in the respective country. And if repatriation is not possible under certain circumstances,
                the proper disposition thereof, upon previous arrangement with the worker’s next of kin, or in the
                absence of the latter, the nearest respective Embassy/ Labor Attaché or Consulate. In all the cases, the
                Second party shall ensure that the benefits due to the worker shall be made available to him or his
                beneficiaries within the shortest possible time.

            </td>

        </tr>


        </tbody>
    </table>

    <table style="line-height: 18px; vertical-align: middle">
        <tbody>
        <tr>
            <td class="rtl" colspan="3">
                <strong> 3) الرسوم والتكاليف:</strong>
            </td>
            <td class="ltr" colspan="3">
                <strong> 3) FEES & COSTS:</strong>

            </td>
        </tr>
        <tr style=" vertical-align: middle;">
            <td class="rtl"><strong>الفئة</strong></td>
            <td class="rtl"><strong>رسوم التوظيف</strong></td>
            <td class="rtl" style="width: 10%"><strong>رسوم معالجة التأشيرة</strong></td>


            <td class="ltr" style="width: 10%"><strong>VISA PROCESS FEE</strong></td>
            <td class="ltr"><strong>RECRUITMENT FEE</strong></td>
            <td class="ltr"><strong>CATEGORY</strong></td>
        </tr>
        <tr style=" vertical-align: middle;">
            <td class="rtl">الرعاية الصحية</td>
            <td class="rtl">{{ $linrco_agreement->healthcare_fee_ar }}</td>
            <td class="rtl" style="width: 10%">{{ $linrco_agreement->healthcare_visa_fee_ar }}</td>


            <td class="ltr" style="width: 10%">{{ $linrco_agreement->healthcare_visa_fee_en }}</td>
            <td class="ltr">{{ $linrco_agreement->healthcare_fee_en }}</td>
            <td class="ltr">HEALTHCARE</td>
        </tr>
        <tr style=" vertical-align: middle;">
            <td class="rtl">ياقة بيضاء</td>
            <td class="rtl">{{ $linrco_agreement->whitecollar_fee_ar }}</td>
            <td class="rtl" style="width: 10%">{{ $linrco_agreement->whitecollar_visa_fee_ar }}</td>


            <td class="ltr" style="width: 10%">{{ $linrco_agreement->whitecollar_visa_fee_en }}</td>
            <td class="ltr">{{ $linrco_agreement->whitecollar_fee_en }}</td>
            <td class="ltr">WHITE COLLAR</td>
        </tr>
        <tr style=" vertical-align: middle;">
            <td class="rtl">الياقات الزرقاء</td>
            <td class="rtl">{{ $linrco_agreement->bluecollar_fee_ar }}</td>
            <td class="rtl" style="width: 10%">{{ $linrco_agreement->bluecollar_visa_fee_ar }}</td>


            <td class="ltr" style="width: 10%">{{ $linrco_agreement->bluecollar_visa_fee_en }}</td>
            <td class="ltr">{{ $linrco_agreement->bluecollar_fee_en }}</td>
            <td class="ltr">BLUE COLLAR</td>
        </tr>
        <tr style=" vertical-align: middle;">
            <td class="rtl">العمال</td>
            <td class="rtl">{{ $linrco_agreement->labor_fee_ar }}</td>
            <td class="rtl" style="width: 10%">{{ $linrco_agreement->labor_visa_fee_ar }}</td>


            <td class="ltr" style="width: 10%">{{ $linrco_agreement->labor_visa_fee_en }}</td>
            <td class="ltr">{{ $linrco_agreement->labor_fee_en }}</td>
            <td class="ltr">LABOR</td>
        </tr>
        <tr style=" vertical-align: middle;">
            <td class="rtl">المرشحون المحالون</td>
            <td class="rtl">{{ $linrco_agreement->referred_candidates_fee_ar }}</td>
            <td class="rtl" style="width: 10%">{{ $linrco_agreement->referred_candidates_visa_fee_ar }}</td>


            <td class="ltr" style="width: 10%">{{ $linrco_agreement->referred_candidates_visa_fee_en }}</td>
            <td class="ltr">{{ $linrco_agreement->referred_candidates_fee_en }}</td>
            <td class="ltr">REFERRED CANDIDATES</td>
        </tr>
        <tr>
            <td class="rtl" colspan="3">
                <strong> 3.1 تعريفات</strong>
            </td>
            <td class="ltr" colspan="3">
                <strong> 3.1 DEFINITIONS</strong>

            </td>
        </tr>
        <tr style=" vertical-align: middle;">
            <td class="rtl">الرعاية الصحية</td>
            <td class="rtl" colspan="2">الممرضات والفنيون والأطباء إلخ</td>
            <td class="ltr" colspan="2">Nurses, Technicians, Doctors Etc.</td>
            <td class="ltr">HEALTHCARE</td>

        </tr>
        <tr style=" vertical-align: middle;">
            <td class="rtl">ياقة بيضاء</td>
            <td class="rtl" colspan="2">إداري / إشرافي / محترف / مدراء</td>
            <td class="ltr" colspan="2">Administrative/ Supervisory/ Professionals/ Managers</td>
            <td class="ltr">WHITE COLLAR</td>

        </tr>
        <tr style=" vertical-align: middle;">
            <td class="rtl">الياقات الزرقاء</td>
            <td class="rtl" colspan="2">المهرة / ذوي المهارات العالية / الفنيين / العاملين / الضيافة</td>
            <td class="ltr" colspan="2">Skilled/ Highly Skilled/ Technicians /Operative /Hospitality Staff</td>
            <td class="ltr">BLUE COLLAR</td>

        </tr>
        <tr style=" vertical-align: middle;">
            <td class="rtl">العمال</td>
            <td class="rtl" colspan="2">البناء / المصنع / التحميل / صيانة التشغيل / التنظيف / البلدية إلخ.</td>
            <td class="ltr" colspan="2">Construction/ Factory/ Loading/ Operation Maintenance /Cleaning /Municipality
                etc.
            </td>
            <td class="ltr">LABOR</td>

        </tr>
        <tr style=" vertical-align: middle;">
            <td class="rtl">المرشحون المُحالون</td>
            <td class="rtl" colspan="2">يتم إحالتهم مباشرة من قبل الطرف الثاني لبدء اجراءاتهم (مختارين مسبقًا).</td>
            <td class="ltr" colspan="2">Directly referred by the Second party for processing (Pre-Selected).</td>
            <td class="ltr">REFERRED CANDIDATES</td>

        </tr>
        </tbody>
    </table>
<br/>
<br/>

    <table style="line-height: 22px; vertical-align: top">

        <tbody>

        <tr>
            <td class="rtl" style="width: 50%;">
                <strong>3.2 شروط الدفع</strong>
            </td>
            <td class="ltr" style="width: 50%;">
                <strong>3.2 TERMS OF PAYMENT</strong>

            </td>
        </tr>
        <tr>
            <td class="rtl" style="width: 50%;">
                <strong>(أ)</strong>. 50٪ من مبلغ الفاتورة المتفق عليه يدفعه الطرف الثاني بعد ختم التأشيرة.<br/>
                <strong>(ب)</strong>.يتم دفع نسبة 50٪ المتبقية من مبلغ الفاتورة المتفق عليه من قبل الطرف الثاني بمجرد
                إصدار تذكرة
                الانضمام إلى المرشح المعني ، قبل وصول المرشح للمملكة.<br/>
                <strong>(ج)</strong> .تأمين إلزامي لجميع التعيينات الجديدة التي يتحملها الطرف الثاني.<br/>
                <strong>(د)</strong>.يجب توفير تذاكر الطيران من قبل الطرف الثاني.<br/>
                <strong>(ه)</strong>.ساعات العمل حسب قانون العمل السعودي.<br/>

                @if($linrco_agreement->data_flow == 1)
                    <strong>(و)</strong>.سيتحمل المرشحون رسوم الداتا فلو Dataflowوالبرومترك Prometric والتصنيف
                    Classification والمصادقة على
                    المستندات مبدئيًا في بلدهم الأصلي، ومن ثم سيتم تعويضها من قبل الطرف الثاني مباشرةً إلى المرشحين بعد
                    وصولهم.
                @endif

            </td>
            <td class="ltr" style="width: 50%;">
                <strong>(a)</strong>. 50% of the agreed invoice amount to be paid by the Second party after the visa
                stamping is done.<br/>
                <strong>(b)</strong>. The remaining 50% of the agreed invoiced amount to be paid by the Second party
                once the Joining ticket is issued to the respective candidate, before their arrival in KSA<br/>
                <strong>(c)</strong>. Mandatory Insurance for all new hires to be borne by the Second party.<br/>
                <strong>(d)</strong>. Air tickets shall be provided by the Second party.<br/>
                <strong>(e)</strong>. Working hours as per the SAUDI LABOR LAW.<br/>

                @if($linrco_agreement->data_flow == 1)
                    <strong>(f)</strong>. The Dataflow, Prometric, Classification and document attestation fees will be
                    shouldered by the candidates initially in their home country and then the same will be reimbursed by the
                    Second party directly to the Candidates after their Arrival.
                @endif
            </td>
        </tr>
        <tr>
            <td class="rtl" style="width: 50%;line-height: 28px;"><strong>3.3</strong>
                من المتفق عليه أن النسخة الإلكترونية من الفاتورة المرسلة من الطرف الأول تعتبر رسمية وكافية لتحصيل
                المدفوعات.

            </td>
            <td class="ltr" style="width: 50%;"><strong>3.3</strong>
                .It is hereby agreed that an electronic copy of invoice sent by the First party is considered official
                and sufficient to effect payment collection.
            </td>
        </tr>
        <tr>
            <td class="rtl" style="width: 50%;">
                <strong>3.4ضريبة القيمة المضافة والضرائب الحكومية الأخرى</strong>
            </td>
            <td class="ltr" style="width: 50%;">
                <strong>3.4.VAT AND OTHER GOVERNMENTAL TAXES</strong>

            </td>
        </tr>
        <tr>
            <td class="rtl" style="width: 50%;">
                <strong>(أ)</strong>من المتفق عليه أن جميع الرسوم المذكورة في اتفاقية التوظيف ليست من الضرائب ولا تشمل
                ضريبة القيمة .<br/>
                <strong>(ب)</strong>.في حالة تطبيق ضريبة القيمة المضافة ، لن تخضع الرسوم المنصوص عليها في اتفاقية
                التوظيف لأي خصومات ولا يجوز فرض ضريبة استقطاع وفي حالة تطبيق أي ضريبة مستقبلاً فيتحملها الطرف الثاني
                منفرداً.


            </td>
            <td class="ltr" style="width: 50%;line-height: 18px;">
                <strong>(a)</strong>. It is hereby agreed that all Fees mentioned in the Recruitment Agreement are not
                of Taxes and are VAT exclusive.<br/>
                <strong>(b)</strong>. In the case of applying (VAT) value-added tax, the fees stipulated in the
                employment agreement will not be subject to any deductions, and it is not permissible to impose a
                withholding tax, and in the event that any tax is applied in the future, it shall be borne by the second
                party alone.
            </td>
        </tr>

        <tr>
            <td class="rtl" style="width: 50%;line-height: 26px;">
                3.5يجب أن يتم سداد جميع المدفوعات من قبل الطرف الثاني في الحسابات بالدولار الأمريكي في غضون خمسة عشر
                (15) يومًا من استلام الفاتورة الصادرة عن الطرف الأول.

            </td>
            <td class="ltr" style="width: 50%;line-height: 26px;">
                3.5.All the payments shall be made by the Second party in the U.S Dollar calculations within fifteen
                (15) days upon receipt of the invoice generated by the First party.
            </td>
        </tr>


        <tr>
            <td class="rtl" style="width: 50%;">
                <strong> 4) التعويض</strong>
            </td>
            <td class="ltr" style="width: 50%;">
                <strong>4) GUARANTEE:</strong>

            </td>
        </tr>
        <tr>
            <td class="rtl" style="width: 50%;line-height: 21px;">
                <strong>4.1</strong>

                على الطرف الأول تقديم تعويض عن رسوم الاستقدام ورسوم معالجة التأشيرة للطرف الثاني إذا تمت إعادة العامل
                <br/>


                <strong>(أ)</strong>فشل في الامتحان الطبي في السعودية.<br/>
                <strong>(ب)</strong>مخالفة الشروط والأحكام المذكورة في عقد العمل الرئيسي الموقع من قبل الموظف قبل
                الوصول.<br/>
                <strong>(ج)</strong>تزوير أوراق اعتماده الوظيفية أو في حالة تقديم شهادات مزورة أو غير صحيحة.<br/>
                <strong>(د)</strong>يتم التنازل عن هذا التعويض ولا يحق المطالبة به نهائياً بالنسبة للمرشحين المحالين وتم
                تعيينهم من قبل الطرف الثاني (مختارين مسبقًا).
            </td>
            <td class="ltr" style="width: 50%;line-height: 19px;">
                <strong>4.1</strong>
                The First party shall provide a reimbursement of the Recruitment Fee and Visa Processing Fee to the
                Second party if the worker is repatriated due to
                <br/>
                <strong>(a)</strong>Fails medical exam in KSA.<br/>
                <strong>(b)</strong> Violation of terms and conditions mentioned in the master employment contract
                signed by the employee before arrival.<br/>
                <strong>(c)</strong>Falsification of his/her employment credentials or in case of producing false or
                fake certificates.<br/>
                <strong>(d)</strong>This compensation is waived and is not permissible to claim it with respect to the
                referred candidates who have been appointed by the Second party (pre-selected).<br/>

            </td>
        </tr>
        <tr>
            <td class="rtl" style="width: 50%;line-height: 20px;">
                <strong>4.2</strong>
                لا يسري التعويض علي الطرف الثاني خلال فترة الاختبار البالغة 90 يومًا إذا تمت إعادة العامل إلى الوطن بسبب
                <br/>


                <strong>(أ)</strong>اختلاف منصب الوظيفة عن الوظيفة التي تم تعيين الموظف من أجلها.<br/>
                <strong>(ب)</strong>إساءة معاملة العامل بما في ذلك الإساءة الجسدية أو اللفظية ضد الموظف .<br/>
                <strong>(ج)</strong>.ظروف العمل اللاإنسانية وعدم دفع رسوم العمل الإضافي والتأخير المعتاد في الراتب.<br/>
                <strong>(د)</strong>خطأ أو إهمال جسيم منسوب كليًا للطرف الثاني.
            </td>
            <td class="ltr" style="width: 50%;line-height: 18px;">
                <strong>4.2</strong>
                .Guarantee within the 90 day probation period shall not apply if a worker is repatriated due to:
                <br/>
                <strong>(a)</strong>Assigning Job Position different from what the employee was hired for.<br/>
                <strong>(b)</strong> Maltreatment of worker including physical or verbal abuse against the
                employee.<br/>
                <strong>(c)</strong> Inhumane working conditions, non-payment of overtime, habitual delay of
                salary.<br/>
                <strong>(d)</strong>Fault or Gross Negligence entirely attributed to the Second party.<br/>

            </td>
        </tr>

        <tr>
            <td class="rtl" style="width: 50%;">
                <strong> 5) صلاحية العقد</strong>
            </td>
            <td class="ltr" style="width: 50%;">
                <strong>5) CONTRACT VALIDITY</strong>

            </td>
        </tr>

        <tr>
            <td class="rtl" style="width: 50%;line-height: 24px;">
                <strong>5.1</strong>
                يجب أن تكون اتفاقية التوظيف هذه سارية المفعول لمدة لا تقل عن سنتين من تاريخ البدء في هذه الاتفاقية ما لم
                يتم إنهاؤها عاجلاً من قبل أي من الطرفين بعد 120 يومًا قبل إشعار خطي. وعلى أي حال ، يجب أن تكون مسؤوليات
                الأطراف سارية المفعول حتى استكمال اتفاقية التوظيف الأخيرة الموقعة مع الموظف. ما لم يخطر أي من الطرفين
                الطرف الآخر بإنهائه ، يتم تجديد هذه الاتفاقية تلقائيًا لمدد مماثلة.

            </td>
            <td class="ltr" style="width: 50%;line-height: 24px;">
                <strong>5.1</strong>
                . This Recruitment Agreement shall be in effect for a period of 2 years from the date of appearing
                herein unless sooner terminated by either party after 120 days prior notice. In any case, the
                responsibilities of the parties shall be in effect up to the completion of the last Employment Agreement
                signed with the Employee. Unless either party notifies the other of its termination, agreement shall be
                automatically renewed annually.

            </td>
        </tr>
        <tr>
            <td class="rtl" style="width: 50%;line-height: 30px;">
                <strong>5.2</strong>
                يجب أن تكون هذه الاتفاقية هي القانون المعمول به بين الطرفين ويجب تفسيرها وفقًا لقوانين المملكة العربية
                السعودية ولكن دون استبعاد أو الإخلال بقوانين الدول المعنية التي يتم تعيين الموظفين منها ، والقوانين
                الدولية ، والعهود. والممارسات

            </td>
            <td class="ltr" style="width: 50%;line-height: 25px;">
                <strong>5.2</strong>
                This Agreement shall be the law between both the parties and shall be interpreted in accordance with the
                laws of the KINGDOM OF SAUDI ARABIA but not to the exclusion of the prejudice to the laws of the
                respective countries the employees are hired from, International Laws, Covenants and Practices.
            </td>
        </tr>
        <tr>
            <td class="rtl" style="width: 50%;line-height: 30px;">
                <strong>5.3</strong>
                في الحالات التي يقوم فيها الطرف الثاني بتحصيل الرسوم التي تكبدها في تعيين الموظف من الدولة المعنية من
                العامل فسيعتبر العقد تلقائيا منتهي و علما ان الرسوم هي رسوم التوظيف و/او رسوم الاجراءات و/او جميع تكاليف
                و النفقات (رسوم التأشيرة، تصريح العمل، تكاليف السفر بالطائرة)

            </td>
            <td class="ltr" style="width: 50%;line-height: 30px;">
                <strong>5.3</strong>
                In cases where in the Second party collects Recruitment Fees, Processing Fees and/or all costs and
                expenses (Visa fees, Work permit, Air fare) of recruitment incurred by the Second party in recruiting
                the employee from the respective country, the contract will be automatically terminated.
            </td>
        </tr>


        <tr>
            <td class="rtl" style="width: 50%;line-height: 35px;">
                <strong> 6) المنازعات القانونية</strong>
            </td>
            <td class="ltr" style="width: 50%;line-height: 35px;">
                <strong>6) LEGAL DISPUTES</strong>

            </td>
        </tr>

        <tr>
            <td class="rtl" style="width: 50%;line-height: 31px;">
                <strong>6.1</strong>
                في حالة الخلاف الناشئ عن تنفيذ عقد العمل بين الطرف الثاني والعامل ، يجب بذل كافة الجهود لتسويتها وديًا.
                إذا لزم الأمر ، يجب إجراء هذه المفاوضات بالتعاون ومشاركة مكتب العمل المعني / السفارة / القنصلية الأقرب
                لموقع العمل.

            </td>
            <td class="ltr" style="width: 50%;line-height: 22px;">
                <strong>6.1</strong>
                In case of dispute arising from the implementations of the employment contract between the Second party
                and the worker, all efforts shall be made to settle them amicably. If necessary, such negotiations shall
                be undertaken in cooperation and with the participation of the Respective Labor office/ Embassy/
                Consulate nearest the site of employment.

            </td>
        </tr>
        <tr>
            <td class="rtl" style="width: 50%;line-height: 32px;">
                <strong>6.2</strong>
                في حالة فشل التسوية الودية ، يتم عرض الأمر على الجهة المختصة أو المناسبة في المملكة العربية السعودية.
                أثناء عملية التسوية أو أثناء النظر في القضية ، يجب على العامل أن يسعى للوفاء بالتزاماته التعاقدية ويجب
                على الطرف الأول التأكد من تنفيذ هذه الالتزامات دون إكراه أو اتهام.

            </td>
            <td class="ltr" style="width: 50%;line-height: 28px;">
                <strong>6.2</strong>
                In case the amicable settlement fails, the matter shall be submitted to the competent or appropriate
                body in KINGDOM OF SAUDI ARABIA. During the process of settlement or while the case is pending, the
                worker shall endeavor to fulfill his contractual obligations and the first party shall ensure that such
                obligations shall be undertaken without duress or recrimination.

            </td>
        </tr>
        <tr>
            <td class="rtl" style="width: 50%;line-height: 32px;">
                <strong>6.3</strong>
                في حالة وجود نزاع يتعلق باتفاقية التوظيف، يجب على الطرفين محاولة حلها وديًا. في حالة فشل جهود التسوية
                الودية، يتم إحالة النزاع إلى غرفة التجارة الدولية للاستماع والفصل فيه أو إلى أي هيئات / محاكم في المملكة
                العربية السعودية بالرياض حيث يتفق الأطراف على تسوية النزاع.

            </td>
            <td class="ltr" style="width: 50%;line-height: 26px;">
                <strong>6.3</strong>
                In case of dispute involving Recruitment Agreement, the parties hereto must attempt to resolve them
                amicably. If the efforts to amicable settlement fail, then the dispute shall be referred to
                international Chamber of Commerce for hearing and adjudication or to whatever bodies/courts of KSA in
                Riyadh where parties agree to have the dispute settled.

            </td>
        </tr>
        </tbody>
    </table>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <table style="line-height: 30px; vertical-align: top">
        <tbody>


        <tr>
            <td class="rtl" style="width: 50%;">
                <strong>إقرار</strong>
            </td>
            <td class="ltr" style="width: 50%;">
                <strong>DECLARATION</strong>
            </td>
        </tr>
        <tr>
            <td class="rtl" style="width: 50%;">
                وإثباتًا على ذلك ، شرع الطرفان في تنفيذ هذه الاتفاقية والتوقيع على النسختين ، من قبل ممثل كل منهما بموجب
                تفويض رسمي اعتبارًا من 10/08/2020 في المملكة العربية السعودية.

            </td>
            <td class="ltr" style="width: 50%;">
                In witness whereof, both the parties have caused this agreement to be executed in two copies, by their
                respective representative thereunto duly authorized as of 10/08/2020 in the KINGDOM OF SAUDI ARABIA

            </td>
        </tr>
        <tr>
            <td class="rtl" style="width: 50%;">
                {{ $linrco_agreement->date }}  التاريخ :

            </td>
            <td class="ltr" style="width: 50%;">
                DATE : {{ $linrco_agreement->date }}

            </td>
        </tr>
        <tr>
            <td class="rtl" style="width: 50%;">
                الطرف الأول
            </td>
            <td class="ltr" style="width: 50%;">
                FIRST PARTY

            </td>
        </tr>
        <tr>
            <td class="rtl" style="width: 50%;">
                شركة ليناركو للتوظيف
            </td>
            <td class="ltr" style="width: 50%;">
                LINRCO

            </td>
        </tr>
        <tr>
            <td class="rtl" style="width: 50%;">
                ممثل عنه:
            </td>
            <td class="ltr" style="width: 50%;">
                REPRESENTED BY

            </td>
        </tr>
        <tr>
            <td class="rtl" style="width: 50%;">
                عايض تركي علي
            </td>
            <td class="ltr" style="width: 50%;">
                AYED TURKY ALI

            </td>
        </tr>
        <tr>
            <td class="rtl" style="width: 50%;text-align: center">
                <br/>
                <br/>
                <br/>
                التوقيع
            </td>
            <td class="ltr" style="width: 50%; text-align: center">
                <br/>
                <br/>
                <br/>
                SIGNATURE
            </td>
        </tr>

        </tbody>
    </table>

    <br>


    <table style="line-height: 35px; vertical-align: top">

        <tbody>

        <tr>
            <td class="rtl" style="width: 50%;">
                 التاريخ : {{ $linrco_agreement->date }}

            </td>
            <td class="ltr" style="width: 50%;">
                DATE : {{ $linrco_agreement->date }}

            </td>
        </tr>
        <tr>
            <td class="rtl" style="width: 50%;">
                  الطرف الثاني
            </td>
            <td class="ltr" style="width: 50%;">
                SECOND PARTY

            </td>
        </tr>
        <tr>
            <td class="rtl" style="width: 50%;">
                شركة :  {{ $linrco_agreement->company->translate('ar')->name }}
            </td>
            <td class="ltr" style="width: 50%;">
                {{ $linrco_agreement->company->translate('en')->name }}

            </td>
        </tr>
        <tr>
            <td class="rtl" style="width: 50%;">
                ممثل عنه:
            </td>
            <td class="ltr" style="width: 50%;">
                REPRESENTED BY

            </td>
        </tr>
        <tr>
            <td class="rtl" style="width: 50%;">
                <br/> {{ $linrco_agreement->company_representative }}
            </td>
            <td class="ltr" style="width: 50%;">
                <br/>
                {{ $linrco_agreement->company_representative }}
            </td>
        </tr>
        <tr>
            <td class="rtl" style="width: 50%;text-align: center">
                <br/>
                <br/>
                <br/>
                التوقيع
            </td>
            <td class="ltr" style="width: 50%; text-align: center">
                <br/>
                <br/>
                <br/>
                SIGNATURE
            </td>
        </tr>

        </tbody>
    </table>
</main>


</body>
</html>
