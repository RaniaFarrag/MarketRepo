<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en" dir="rtl">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>Visa Agreement Service</title>

    <style>
        @page {
            margin: 120px 20px 50px 20px;
            header: page-header;
            footer: page-footer;
        }

        body {
            font-size: 13px;
            letter-spacing: 0px;
            position: relative;
            text-align: right;
            font-family: 'examplefont3', sans-serif;
        }

        main {
            height: 870px;
            position: relative;
            display: block;
        }

        .ar {
            font-family: 'examplefont3', sans-serif;
        }

        .en {
            font-family: 'examplefont3', sans-serif;
            direction: ltr;
        }

        td {
            padding: 2px 5px;
            text-align: center;
            border: 1px solid #77697a;
            border-collapse: collapse;
            font-size: 14px !important;
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
            border: 1px solid #77697a
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
            height: 0cm;
        }

        footer {
            position: absolute;
            bottom: 0cm;
            left: 0cm;
            right: 0cm;
            text-align: center;
            width: 100%;
        }

        table {
            page-break-inside: auto
        }

        tr {
            page-break-inside: avoid;
            page-break-after: auto
        }

        header table tr td {
            font-size: 11px !important;
            background: #000
        }
    </style>
</head>


<body dir="rtl">

<htmlpageheader name="page-header">
    <header>
        <div style="width: 100%;margin: auto; padding: 20px; margin-bottom: 20px;">
            <table style="text-align: center; direction: ltr">
                <tbody>
                <tr>
                    <td style="font-size: 10px !important; font-weight: bold">CLIENT CODE</td>
                    <td style="font-size: 10px !important; font-weight: bold">MOL</td>
                    <td style="font-size: 10px !important; font-weight: bold">COMPANY NAME</td>
                    <td style="font-size: 10px !important; font-weight: bold">LOCATION</td>
                </tr>
                <tr>
                    <td style="font-size: 11px !important;">{{ $fnrco_flat_red_agreement->company->client_code }}</td>
                    <td style="font-size: 11px !important;">{{ $fnrco_flat_red_agreement->mol }}</td>
                    <td style="font-size: 11px !important;">{{ $fnrco_flat_red_agreement->company->name }}</td>
                    <td style="font-size: 11px !important;">{{ $fnrco_flat_red_agreement->location }}</td>
                </tr>
                <tr>
                    <td style="font-size: 11px !important; font-weight: bold" colspan="2">AGREEMENT NUMBER</td>
                    <td style="font-size: 11px !important; font-weight: bold">AGREEMENT ISSUE DATE</td>
                    <td style="font-size: 11px !important; font-weight: bold">AGREEMENT EXPIRY DATE</td>

                </tr>
                <tr>
                    <td style="font-size: 11px !important;" colspan="2">{{ $fnrco_flat_red_agreement->agreement_num }}</td>
                    <td style="font-size: 11px !important;">{{ $fnrco_flat_red_agreement->agreement_issue_date }}</td>
                    <td style="font-size: 11px !important;">{{ $fnrco_flat_red_agreement->agreement_expiry_date }}</td>

                </tr>
                </tbody>
            </table>
        </div>
        <br/>
        <br/>
    </header>
</htmlpageheader>


<htmlpagefooter name="page-footer">

    <footer><img style="width: 100%" src="http://alwatnia.com.sa/demo/linrcopdf/ffoot.jpg"></footer>
</htmlpagefooter>


<main>

    <table style="line-height: 22px">

        <tbody>
        <tr>
            <td style="width: 50%; text-align: center;  font-size: 14px; line-height: 24px">
                <strong>
                    عقد تقديم خدمات عمالية<br/>
                    تم إبرام هذه العقد بين كلاً من : -

                </strong>
            </td>

            <td class="en ltr" style="width: 50%; text-align: center;  font-size: 14px;line-height: 24px"><strong>Manpower
                    Agreement Service<br>
                    This contract is executed and entered between: </strong>
            </td>
        </tr>
        <tr>
            <td style="width: 50%; text-align: right;  font-size: 12px; vertical-align: top">
                1. الشركة الوطنية الأولى للخدمات شركة سعودية مساهمه مقفلة سجل تجاري رقم 101035364 و يمثلها في التوقيع
                على هذا العقد السيد / عايض تركي علي بصفته نائب المدير العام،<br>
                العنوان المملكة العربية السعودية مدينة الرياض ، حي الملز<br>
                ص.ب 261656<br>
                الهاتف : 4772451<br>
                فاكس : 00966112457248<br>
                ويشار إليها في هذا العقد بالطرف الأول


            </td>
            <td class="en ltr" style="width: 50%; text-align: left; font-size: 12px; vertical-align: top">
                1. The first national Company, a Saudi Closed Joint Stock Company, Commercial Registration #:101035364,
                and represented in signing hereon by Mr Ayed Turki Ali in his capacity as Deputy General Manager<br>
                Address: Riyadh, AL MALAZ, Kingdom of Saudi Arabia.<br>
                P.O BOX 261656<br>
                Tel.: 4772451<br>
                Fax: 00966112457248<br>
                (hereinafter called the FIRST PARTY)


            </td>
        </tr>
        <tr>
            <td style="width: 50%; text-align: center;  font-size: 14px; line-height: 24px">
                <strong>
                    و بين

                </strong>
            </td>

            <td class="en ltr" style="width: 50%; text-align: center;  font-size: 14px;line-height: 24px"><strong>
                    And between
                </strong>
            </td>
        </tr>
        <tr>
            <td style="width: 50%; text-align: right;  font-size: 12px; vertical-align: top">
                2. {{ $fnrco_flat_red_agreement->company->name }} و هي شركة عاملة مسجلة تحت نظام وزارة العمل في المملكة العربية السعودية بموجب السجل التجاري
                رقم {{ $fnrco_flat_red_agreement->company->cr }} تاريخ {{ $fnrco_flat_red_agreement->cr_date }} ونظام وزارة الموارد البشرية و التنمية الاجتماعية بالرقم {{ $fnrco_flat_red_agreement->hr_system }} و يمثلها بالتوقيع
                على هذا العقد السيد {{ $fnrco_flat_red_agreement->signing_by }}بصفته  {{ $fnrco_flat_red_agreement->by_as }}<br/>
                العنوان:{{ $fnrco_flat_red_agreement->address_ar }}<br/>
                الهاتف: {{ $fnrco_flat_red_agreement->phone }}<br/>
                فاكس: {{ $fnrco_flat_red_agreement->fax }}<br/>
                الرمز البريدي{{ $fnrco_flat_red_agreement->postal_code }}<br/>
                البريد الإلكتروني:{{ $fnrco_flat_red_agreement->company->email }}<br/>
                ويشار إليها في هذا العقد بالطرف الثاني


            </td>
            <td class="en ltr" style="width: 50%; text-align: left; font-size: 12px; vertical-align: top">
                2- {{ $fnrco_flat_red_agreement->company->name }} , a company registered under the system of the Ministry of Commerce and
                Investment in the Kingdom of Saudi Arabia under the commercial registration No {{ $fnrco_flat_red_agreement->company->cr }} Date/ {{ $fnrco_flat_red_agreement->cr_date }}
                and the law of the Ministry of Human Resources and Social Development
                under No/ {{ $fnrco_flat_red_agreement->hr_system }} and represented in signing hereon by Mr. / {{ $fnrco_flat_red_agreement->signing_by }} in his capacity as
                {{ $fnrco_flat_red_agreement->by_as }}<br/>
                Address: {{ $fnrco_flat_red_agreement->address_en }}<br/>
                Tel: {{ $fnrco_flat_red_agreement->phone }}<br/>
                Fax :{{ $fnrco_flat_red_agreement->fax }}<br/>
                (hereinafter called the SECOND PARTY)


            </td>
        </tr>
        <tr>
            <td style="width: 50%; text-align: center;  font-size: 14px; line-height: 24px">
                <strong>
                    تمهيد:

                </strong>
            </td>

            <td class="en ltr" style="width: 50%; text-align: center;  font-size: 14px;line-height: 24px"><strong>
                    Preamble:
                </strong>
            </td>
        </tr>
        <tr>
            <td style="width: 50%; text-align: right;  font-size: 12px; vertical-align: top">
                نظراً لأن الطرف الثاني يرغب في استقدام كوادر من الدول المسموح استقدام الكوادر منها وفقا لأنظمة ولوائح
                المملكة العربية السعودية ، وذلك لحاجة الشركة لكوادر مهنية وفنية وحرفية.<br/>
                وحيث أن الطرف الأول لديه ترخيص إستقدام كوادر من الخارج ويملك الخبرة المهنية في هذا المجال ، وأبدى
                استعداده وموافقته للقيام بهذه المهمة، فقد تم اختياره ليكون أحد الممثلين المعتمدين للطرف الثاني لإستقدام
                الكوادر المطلوبة ، وقد اتفق الطرفان وهما بكامل الأهلية المعتبرة شرعًا لإبرام مثل هذه العقود على البنود
                التالية:


            </td>
            <td class="en ltr" style="width: 50%; text-align: left; font-size: 12px; vertical-align: top">Whereas the
                Second party is willing to recruit candidates from the countries allowing such recruitment following the
                regulations of Saudi Arabia, due to the company’s need for technical and professional candidates. And
                since the Second party has a license for recruiting candidates from abroad and has the professional
                experience in respect to this field, as well as he is ready and agrees to perform this job, then he is
                selected to be one of the authorized representatives of the Second party to recruit the candidates
                required. The two parties competently agreed on the following:


            </td>
        </tr>
        <tr>
            <td style="width: 50%; text-align: center;  font-size: 14px; line-height: 24px">
                <strong>
                    ﻣوﺿوع الاتفاقية

                </strong>
            </td>

            <td class="en ltr" style="width: 50%; text-align: center;  font-size: 14px;line-height: 24px"><strong>
                    AGREEMENT Scope
                </strong>
            </td>
        </tr>
        <tr>
            <td style="width: 50%; text-align: right;  font-size: 12px; vertical-align: top">
                يعتبر التمهيد المتقدم جزءًا لا يتجزأ من هذا العقد يقرأ ويفسر معه.
                <br/>
                اتفق الطرفان على أن يمثل الطرف الأول الطرف الثاني في استقدام و توظيف الكوادر و المرشحين المطلوبين طبقًا
                للملاحق المرفقة (١) و (٢)


            </td>
            <td class="en ltr" style="width: 50%; text-align: left; font-size: 12px; vertical-align: top">
                The above-mentioned preamble shall be read and construed as an integrated part of this contract.
                <br/>
                The two parties agree the first party shall represent the Second party in the recruitment of the
                candidates based on annexures (1) & (2)


            </td>
        </tr>
        <tr>
            <td style="width: 50%; text-align: right;  font-size: 12px; vertical-align: top">
                <span style="text-decoration: underline"> اﻟﺘﺰاﻣﺎت اﻟﻄﺮف اﻷول:</span><br/>

                يتعهد الطرف الأول بتقديم كافة الخدمات المتعلقة بـالاجراءات التالية:<br/>
                1. إنهاء إجراءات الإقامة وتراخيص العمل والتأمين الطبي وتوزيع الرواتب.<br/>
                2. إﺻدار بطاقة اﻹﻗﺎﻣﺔ للموظف ﺧﻼل اﻟﻔﺗرة اﻟﻣﺳﻣوح ﺑﮭﺎ ﻓﻲ ﻣدة ﻻ ﺗﺗﺟﺎوز ﺛﻼﺛﯾن ﯾوم من ﺗﺎرﯾﺦ الدخول للمملكة
                وبعد سداد الطرف الثاني كافة المبالغ المطلوبة منه لإنهاء هذه الاجراءات .<br/>
                3. فتح الحسابات البنكية للموظفين لدفع رواتبهم.<br/>
                4. المحافظة على نسبة التوطين حسب متطلبات وزارة الموارد البشريه والتنميه الاجتماعيه.


            </td>
            <td class="en ltr" style="width: 50%; text-align: left; font-size: 12px; vertical-align: top">

                <span style="text-decoration: underline"> OBLIGATIONS OF FIRST PARTY:</span><br/>

                The FIRST PARTY undertakes to do all necessary
                arrangements pertaining to:<br/>
                1. Iqama processing, work permit, medical insurance and salaries.<br/>
                2. Guarantees the iqama issuance within the permitted period for each employee that shall not exceed 30
                days from the employee’s arrival to the Kingdom of Saudi Arabia after the Second party pays all required
                fees to complete the procedures.<br/>
                3. Open bank accounts for employees’ payroll.<br/>
                4. Maintain the percentage of Saudization according to the requirements of the Ministry of Human
                Resources & Social Development.


            </td>
        </tr>
        <tr>
            <td style="width: 50%; text-align: right;  font-size: 12px; vertical-align: top">
                <span style="text-decoration: underline">اﻟﺗزاﻣﺎت اﻟطرف اﻟﺛﺎﻧﻲ:</span><br/>

                1. إصدار أمر العمل و وصف وظيفي للمهنة المطلوب توفيرها من جانب الطرف الأول. ويلتزم الطرف الثاني حسب ما
                يقتضيه أمر العمل باجراء المقابلات الشخصية للكوادر والمرشحين باختلاف فئاتهم ومؤهلاتهم (متوسطين ومهرة
                ومحترفين). بالإضافة لتأمين كافة مصروفات السفر والسكن للكوادر وتأمين نقل العمال والطعام وكافة الرسوم
                النظامية ، وكل ما يلزم خلال رحلة إجراء المقابلات للعمالة.
                <br/>
                2. متابعة وإنهاء اجراءت التأشيرة للعمالة المستقدمة ، ما لم يتفق الطرفان بشأن تحديد وإسناد مسؤولية هذه
                المهمة لأي منهما بحسب الأسعار الواردة في الملحق رقم (١)
                <br/>
                3. توفير صورة من السجل التجاري وشهادة الزكاة وصورة شهادة التوطين وصورة بطاقة وهوية ملاك المنشأة و صورة
                من عقد تأسيس الشركة أو النظام الأساسي للطرف الأول متى طلب منه ذلك علي أن تكون كافة هذه المستندات سارية
                لمدة لاتقل عن شهرين علي الاقل وكذلك صورة من تفويض الشخص المخول بتوقيع هذا العقد مصدقة من الغرفة التجارية
                إلى الطرف الأول عند التوقيع على هذا العقد.
                <br/>
                4. لا يحق للطرف الثاني مطالبة الطرف الأول باستبدال أي من الكوادر العاملين لديه طوال فترة التعاقد لأي سبب
                كان.
                <br/>
                5. يلتزم الطرف الثاني بتقديم الطعام المجاني للعمالة أو بدل طعام، بالإضافة إلى توفير مستلزمات ومعدات
                إعداد الطعام للموظفين.
                <br/>
                6. يلتزم الطرف الثاني بتوفير خدمات النقل للعمالة المطلوبة خلال فترة الاتفاقية، وتأمين معدات السلامة
                والوقاية الشخصية والتدريب لهم علي الاعمال المطلوبة منهم بالاضافة الي توفير أي معدات أو آليات قد تكون
                مطلوبة لتنفيذ الأعمال وإصدار الشهادات وبوالص التأمين اللازمة كتأمين المركبات وغيرها، كما يلتزم بتأمين
                السكن الملائم لهم أيضا كلاً حسب وظيفته وحسب المتفق عليه مع العامل عند إستقدامه.


            </td>
            <td class="en ltr" style="width: 50%; text-align: left; font-size: 12px; vertical-align: top">

                <span style="text-decoration: underline">OBLIGATIONS OF SECOND PARTY:</span><br/>

                1. Issuing a detailed Job Order and a Job Description of the profession to be provided by the FIRST
                PARTY. The SECOND PARTY shall be responsible according to the job order for making the Interviews for
                the candidates un-skilled, semi-skilled, skilled and professionals. Along with providing housing,
                transportation, food and all statutory fees for candidates during the overseas interviews.<br/>
                2. The Second party shall do visa processing and sourcing; however, this procedure can be scope of
                either party based on rates mentioned in Annexure (1).<br/>
                3. Provide copy of the commercial registration, Zakat certificate, Saudization certificate, signatory ID
                card, and company’s memorandum of association or articles of association of the first party whenever
                requested to do so. as well as a copy of the authorization of the person assigned to sign this contract
                for Chamber of Commerce attestation to the First Party when signing this contract.<br/>
                4. The Second Party has no right to ask the FIRST PARTY for replacing the employees for any reason.<br/>
                5. The Second Party shall provide either free food or food allowance with necessary kitchen utensils and
                cooking facilities.<br/>
                6. SECOND PARTY shall provide transportation for the hired workers, safety and personal protection and
                training for the required tasks in addition to providing any equipment or machines that may be required
                to carry out the business and issue certificates and insurance policies needed along with appropriate
                accommodation, each according to his job as agreed upon with the employee.


            </td>
        </tr>
        <tr>
            <td style="width: 50%; text-align: right;  font-size: 12px; vertical-align: top">
                <span style="text-decoration: underline">الرسـوم :</span><br/>

                1. يلتزم الطرف الثاني بدفع مستحقات الطرف الأول وذلك في مواعيد استحقاقها.<br/>
                2. إذا تأخر الطرف الثاني في دفع أي مبلغ مستحق للطرف الأول في موعده المتفق عليه (15 يوم من تاريخ إصدار
                الفاتورة كحد أقصى) يتم إشعاره بضرورة السداد خلال مدة أقصاها سبعة أيام و بعد إنقضاء هذه المدة من غير سداد
                للمبالغ المستحقة يحق للطرف الأول مباشرة ودون الرجوع للطرف الثاني اتخاذ كافة الاجراءات التي يراها مناسبه
                ومنها ما يلي :-<br/>

                أ) إنهاء العقد بالكامل و سحب جميع العمالة فوراً.
                <br/>
                ب) الإستمرار في تنفيذ العقد مع سحب العمالة التي لم يقوم الطرف الثاني بسداد الأتعاب المستحقة عنهم.
                <br/>
                ج) اﻟﺘﻘﺪم ﻟﻠﺠﮭﺎت اﻟﻤﺨﺘﺼﺔ واﺗﺨﺎذ اﻹﺟﺮاءات اﻟﻨﻈﺎﻣﯿﺔ اﻟﺘﻲ ﺗﺤﻔﻆ ﺣﻘﮫ لإلزام الطرف الثاني بالوفاء مستحقات
                الطرف الاول .


            </td>
            <td class="en ltr" style="width: 50%; text-align: left; font-size: 12px; vertical-align: top">

                <span style="text-decoration: underline">Fees:</span><br/>

                1. Second Party must pay the dues of the First Party on their due dates. <br/>
                2. If the Second Party fails to pay any amount due to the First Party within (maximum 15 days of invoice
                issuance date), Second Party will be notified of the need to pay within a maximum period of seven days.
                After this period with no payment, the First Party has the right to take all measures it deems
                appropriate without referring to the Second party, including the following: <br/>
                a) Terminate the contract and withdraw all workers immediately. <br/>
                b) Continue to implement the contract with the withdrawal of workers which has not been paid by the
                SECOND PARTY. <br/>
                c) Taking the necessary legal actions through the competent authorities to oblige the Second party to
                fulfill the dues of the first party.


            </td>
        </tr>
        <tr>
            <td style="width: 50%; text-align: right;  font-size: 12px; vertical-align: top">
                <span style="text-decoration: underline">أحكام وشروط :</span><br/>
                - تحدد ﻧﺴﺐ ﺣﺼﺺ ﺟﻨﺴﯿﺎت اﻟﻌﻤﺎﻟﺔ وﻓﻘﺎً ﻷﻧﻈﻤﺔ وﻟﻮاﺋﺢ وزارة الموارد البشرية و التنمية الاجتماعية السعودية.
                <br/>
                - ﺗﻐﯿﯿﺮ اﻟﻤﮭﻦ ﺑﺎﻹﻗﺎﻣﺔ ﺑﻌﺪ ﻮﺻﻮل المرشحين يكون ﺧﺎﺿﻊ ﻟﻘﻮاﻧﯿﻦ و ﺳﯿﺎﺳﺎت اﻟﺠﮭﺎت اﻟﻤﺨﺘﺼﺔ، وأي ﺗﻜﺎﻟﯿﻒ ﻣﺮﺗﺒﻄﺔ
                ﺑﻌﻤﻠﯿﺔ ﺗﻐﯿﯿﺮ اﻟﻤﮭﻦ ﯾﺘﺤﻤﻠﮭﺎ اﻟﻄﺮف اﻟﺜﺎﻧﻲ.
                <br/>
                - يحق للطرف الأول تعديل أسعار خدمات العمالة المرفقة في العقد لمواكبة أي تعديلات تحدث في أي رسوم حكومية
                مثل رسوم الإقامة و الضرائب والتأمين الطبي وتذاكر الطيران و رسوم تأشيرة الخروج و العودة و أي رسوم حكومية
                أخرى و يتم تحصيل الرسوم من الطرف الثاني متى ما بدأت الجهات الرسمية في تحصيلها. وإذا تأخر الطرف الثاني عن
                السداد لأي سبب كان وترتب علي هذا التأخير غرامات فيتحملها الطرف الثاني منفرداً .
                <br/>
                - تكون ﻓﺘﺮة اﺳﺘﻘﺪام اﻟﻌﻤﺎﻟﺔ ٩٠ ﯾﻮﻣ ﺎً كحد أقصى ﻣﻦ ﺗﺎرﯾﺦ ﺗﻘﺪﯾﻢ اﻟﻮﻛﺎﻟﺔ اﻹﻟﻜﺘﺮوﻧﯿﺔ.
                <br/>
                - يكون الموظفين والعاملين المطبق عليهم هذا العقد تحت مسئولية و إشراف الطرف الثاني بشكل كامل . وﯾتكفل
                اﻟﻄﺮف اﻟﺜﺎﻧﻲ ﺑﺘﺮﺗﯿﺐ ﻛﺎﻓﺔ إﺟﺮاءات اﻟﻨﻘﻞ ﻣﻦ وإﻟﻰ اﻟﻤﻄﺎر في المملكة السعودية ضمن رحلات الوصول والمغادرة
                خلال ﻓﺘﺮة اﻟمقابلات وتجهيز اﻠﻤﻮظﻔﯿﻦ، ويتحمل كافة الرسوم المترتبة على تحديد وتنفيذ الاختبارات الخارحية أو
                الداخلية للمرشحين بغرض تحديد الكفاءة المهنية أو تطويرها.

            </td>
            <td class="en ltr" style="width: 50%; text-align: left; font-size: 12px; vertical-align: top">

                <span style="text-decoration: underline">Terms & Conditions:</span><br/>

                - Nationality percentages shall be in accordance
                with the quota set by the Saudi Ministry of Human Resources & Social Development.<br/>
                - Profession change shall be considered as per
                Saudi Ministry of Human Resources & Social Development regulations. All expenses shall be borne by
                Second Party.<br/>
                - The FIRST PARTY has the right to change the charges to keep up with any governmental fee’s variation
                such as iqama fees, taxes, medical insurance and airline tickets, exit re-entry visa charges and any
                other governmental fees. The fees shall be collected from the SECOND PARTY when the official authorities
                start collecting them. If the Second party delays payment for any reason, and this delay results in
                fines, the Second party shall bear them alone.<br/>
                - Mobilization period shall be maximum 90 days from the date of submission of E-wakala.<br/>
                - Employees shall be under the supervision
                of the SECOND PARTY. The Second Party shall arrange for all transfers to and from the airport during the
                processing period for the employees, including upon their first arrival and departure to/from Saudi
                Arabia, in addition to all fees and charges that are related to overseas or local tests to determine or
                develop the candidate’s competence.


            </td>
        </tr>
        <tr>
            <td style="width: 50%; text-align: right;  font-size: 12px; vertical-align: top">

                - إن رواتب الموظفين وكافة المصروفات المتصلة بها بما فيها رسوم الطرف الأول سيتم تطبيقها اعتباراً من تاريخ
                وصول الموظف للمملكة العربية السعودية.
                <br/>
                - عدد ساعات العمل لكافة العمال الذين تم استقدامهم ({{ $fnrco_flat_red_agreement->work_hours }}) ساعات في اليوم بمعدل {{ $fnrco_flat_red_agreement->work_days }} أيام في الأسبوع بعدد ({{ $fnrco_flat_red_agreement->work_hours_weekly }})
                ساعة في الأسبوع. وفي حالة العمل الإضافي أو العمل أثناء العطلات يدفع للكادر أجراً إضافياً ﺣﺴﺐ ﻣﻌﺪل دﻓﻊ
                ﺑﺪل اﻟﻌﻤﻞ اﻹﺿﺎﻓﻲ اﻟﻤﻌﺘﻤﺪ ﻟﺪى وزارة الموارد البشرية والتنمية الإجتماعية. وأي تعديل في ساعات عمل الموظفين
                إلى أقل من ({{ $fnrco_flat_red_agreement->work_hours_weekly }}) ساعة في الأسبوع سيتم تطبيقة وفقاً للأنظمة في المملكة العربية السعودية دون التأثير على
                رسوم الطرف الأول و أتعابه الشهرية.
                <br/>
                - وبالنسبة لإجازات الموظفين. ﯾﺴﺘﺤﻖ اﻟﻤﻮظﻒ إﺟﺎزة ﻣﺮﺿﯿﺔ ﺑﻨﺎءً ﻋﻠﻰ ﺗﻘﺮﯾﺮ وﺗﻮﺻﯿﺔ اﻟﻄﺒﯿﺐ اﻟﻤﺨﺘﺺ. أما الاﺟﺎزات
                اﻟﻄﺎرﺋﺔ ﯾﺘﻢ ﺗﻘﺪﯾﺮھﺎ واﻋﺘﻤﺎدھﺎ وﻓﻘ ﺎً ﻷﻧﻈﻤﺔ ﻣﻜﺘﺐ اﻟﻌﻤﻞ.
                <br/>
                - ﻛﺎﻓﺔ اﻹﺟﺎزات اﻟﻤﺮﺿﯿﺔ وﻓﺘﺮات اﻟﻐﯿﺎب واﻹﺟﺎزات اﻟﺸﺨﺼﯿﺔ واﻟﻤﻜﻮث أﻛﺜﺮ ﻣﻦ أﯾﺎم اﻹﺟﺎزة اﻟﺴﻨﻮﯾﺔ واﻹﺟﺎزات
                اﻟﻄﺎرﺋﺔ ﻻ أﺛﺮ ﻟﮭﺎ ﻋﻠﻰ أﺗﻌﺎب اﻟﻄﺮف اﻷول اﻟﺸﮭﺮﯾﺔ المتفق عليها في العقد.

            </td>
            <td class="en ltr" style="width: 50%; text-align: left; font-size: 12px; vertical-align: top">

                - Employees’ salaries, all related expenses and the
                FIRST PARTY’s monthly charges shall apply from the date of arrival of the employee in the Kingdom of
                Saudi Arabia.<br/>
                - All employees shall work {{ $fnrco_flat_red_agreement->work_hours }} hours a day, {{ $fnrco_flat_red_agreement->work_days_en }} days a week ({{ $fnrco_flat_red_agreement->work_hours_weekly }} hrs/week). In case of overtime work during
                off days, employees are entitled for overtime payment according to Ministry of Human Resources & Social
                Development regulations. Any changes in the employee's working hours to less than forty-eight ({{ $fnrco_flat_red_agreement->work_hours_weekly }}) hours
                per week will be applied according to the laws in the Kingdom of Saudi Arabia, without affecting the
                First Party's charges.<br/>
                - Employees’ sick leave shall be based on the
                report and recommendation of a competent physician. Emergency Leaves shall be approved as per Ministry
                of Human Resources & Social Development regulations.<br/>
                - Candidate’s sick leave, absence, personal leave,
                Overstay in home country during vacation, and emergency vacation, shall not be adjusted with the FIRST
                PARTY’s monthly charges.


            </td>
        </tr>
        <tr>
            <td style="width: 50%; text-align: center;  font-size: 14px; line-height: 24px">
                <strong>
                    الغاء الاﺗﻔﺎﻗﯿﺔ:

                </strong>
            </td>

            <td class="en ltr" style="width: 50%; text-align: center;  font-size: 14px;line-height: 24px"><strong>
                    TERMINATION OF AGREEMENT:
                </strong>
            </td>
        </tr>

        <tr>
            <td style="width: 50%; text-align: right;  font-size: 12px; vertical-align: top">
                -في حال رغبه الطرف الثاني عدم إستكمال مدة الأتفاقية فيما يخص أي موظف فإنه يتوجب عليه إشعار الطرف الأول
                برغبته في الإنهاء قبل 60 يوماً من التاريخ المراد الإنهاء فيه. وفي حال إلتزامه بذلك يتحمل دفع 50% ﻣن
                اﻷﺗﻌﺎب اﻟﺷﮭرﯾﺔ ﻟﺑﺎﻗﻲ ﻓﺗرة اﻻﺗﻔﺎﻗﯾﺔ وﻗﯾﻣﺔ ﺗذﻛرة رﺣﻠﺔ اﻟﻌودة ﺑﺎﻹﺿﺎﻓﺔ إﻟﻰ رسوم الإقامات ورخص العمل وأي رسوم
                حكومية أخرى وراﺗب ﺷﮭرﯾن ﻟﻛل موظف.
                <br/>
                -ﻓﻲ ﺣﺎل ﻋدم إﺷﻌﺎر اﻟطرف اﻟﺛﺎﻧﻲ ﺑرﻏﺑﺗﮫ ﻓﻲ إﻧﮭﺎء اﻻﺗﻔﺎﻗﯾﺔ ﻓﻲ اﻟﻣدة اﻟﻣﻧﺻوص ﻋﻠﯾﮭﺎ ﻓﯾﺗﺣﻣل اﻟطرف اﻟﺛﺎﻧﻲ
                اﻟﺗﻛﺎﻟﯾف اﻟﻣﺳﺗﺣﻘﺔ ﻋﻠﯾﮫ ﻋن اﻟﻔﺗرة اﻟﺳﺎﺑﻘﺔ ﺑﺎﻹﺿﺎﻓﺔ إﻟﻰ ﻛﺎﻣل اﻷﺗﻌﺎب اﻟﺷﮭرﯾﺔ ﻟﺑﺎﻗﻲ ﻓﺗرة اﻻﺗﻔﺎﻗﯾﺔ، ورﺳوم
                اﻹﻗﺎﻣﺎت ورﺧص اﻟﻌﻣل وأي رﺳوم ﺣﻛوﻣﯾﺔ أﺧرى ﻋن ﻛﺎﻣل ﻓﺗرة اﻻﺗﻔﺎﻗﯾﺔ، وﻗﯾﻣﺔ ﺗذﻛرة رﺣﻠﺔ اﻟﻌودة ﺑﺎﻹﺿﺎﻓﺔ إﻟﻰ راﺗب
                ﺷﮭرﯾن ﻟﻛل ﻋﺎﻣل.


            </td>
            <td class="en ltr" style="width: 50%; text-align: left; font-size: 12px; vertical-align: top">


                -The SECOND PARTY shall notify the FIRST PARTY of its desire to terminate the Agreement 60 days prior to
                the expiry date plus 50% of the monthly fees for the rest of the agreement period, in addition to iqama
                fees, work permits fees and any other government fees due in the period of the Agreement, the return
                flight ticket and two- month salary for each employee.
                <br/>
                -If the SECOND PARTY does not notify the FIRST PARTY of its desire to terminate the Agreement within the
                period specified, the SECOND PARTY shall bear the costs due for the previous period and the full monthly
                fees for the rest of the Agreement period, in addition to iqama fees, work permits fees and any other
                government fees due in the period of the Agreement plus the return flight ticket and two-month salary
                for each employee.



            </td>
        </tr>
        <tr>
            <td style="width: 50%; text-align: right;  font-size: 12px; vertical-align: top">

                -في حالة استقالة الموظف المختار من قبل الطرف الثاني أو هروبة أو أخذ إجازة دون عودة للملكة يجب علي الطرف
                الثاني إبلاغ الطرف الاول خلال 24 ساعة من تاريخ الهروب لإتخاذ الاجراءات النظامية وإلا تحمل الطرف الثاني
                منفراداً المسئولية القانونية والمالية كاملة ، كما يلتزم الطرف الثاني بدفع كافة الاتعاب المستحقة عليه عن
                الفترة السابقة. بالإضافة إلى رسوم الإقامات ورخص العمل وأي رسوم حكومية تخص فترة الاتفاقية بالكامل، إضافة
                إلى 50% من الأتعاب الشهرية لباقي فترة الاتفاقية.
                <br/>
                تسري هذه الشروط سواء ﻛﺎن اﻹﻧﮭﺎء ﻣﺗﻌﻠﻘﺎ ﺑﻛﺎﻣل اﻻﺗﻔﺎﻗﯾﺔ أو ﺑﺟزء ﻣﻧﮭﺎ فيما ﯾﺧص ﻣوظﻔﺎ أو أﻛﺛر.


            </td>
            <td class="en ltr" style="width: 50%; text-align: left; font-size: 12px; vertical-align: top">

 
                -In the case of resignation or escape of the employee
                selected by the SECOND PARTY or if the employee takes a leave and not return to Saudi Arabia, the Second
                party must inform the first party within 24 hours from the date of escape to take the legal measures,
                otherwise the Second party alone bears full legal and financial responsibility, and the SECOND PARTY
                shall pay the costs due for the previous period. In addition to iqama fees, work permit fees and any
                other governmental fees for the full period of the Agreement, plus 50% of the monthly fees for the
                remaining period of the Agreement. These terms shall be applied whether the termination relates to the
                entire Agreement or relates to one or more employees.


            </td>
        </tr>
        <tr>
            <td style="width: 50%; text-align: center;  font-size: 14px; line-height: 24px">
                <strong>
                    اﻟﻨﺰاﻋﺎت وﺟﮭﺎت اﻻﺧﺘﺼﺎص اﻟﻘﻀﺎﺋﻲ:
                </strong>
            </td>

            <td class="en ltr" style="width: 50%; text-align: center;  font-size: 14px;line-height: 24px"><strong>
                    DISPUTES & LEGAL JURISDICTION
                </strong>
            </td>
        </tr>

        <tr>
            <td style="width: 50%; text-align: right;  font-size: 12px; vertical-align: top">
                يتم تفسير هذا العقد وفقاً للقوانين و الأنظمة المعمول بها في المملكة العربية السعودية ومحاكمها و أي
                نزاعات أو خلافات قد تنشأ من هذا العقد و التي لا يمكن أن يتم تسويتها بالطرق الودية بين الطرفين يكون
                الأختصاص المكاني بنظرها محاكم مدينة الرياض في المملكة العربية السعودية.

            </td>
            <td class="en ltr" style="width: 50%; text-align: left; font-size: 12px; vertical-align: top">

                This contract is interpreted in accordance with the laws and regulations in force in the Kingdom of
                Saudi Arabia and its courts. In the case of disputes or conflicts that may arise from this contract
                between both parties and cannot be settled amicably, the spatial jurisdiction of its adjudication will
                be assigned to the courts of Riyadh in the Kingdom of Saudi Arabia.
            </td>
        </tr>

        <tr>
            <td style="width: 50%; text-align: center;  font-size: 14px; line-height: 24px">
                <strong>
                    ﻧﺴﺦ اﻻﺗﻔﺎﻗﯿﺔ:
                </strong>
            </td>

            <td class="en ltr" style="width: 50%; text-align: center;  font-size: 14px;line-height: 24px"><strong>
                    AGREEMENT COPIES
                </strong>
            </td>
        </tr>
        <tr>
            <td style="width: 50%; text-align: right;  font-size: 12px; vertical-align: top">
                حرر هذا العقد من نسختين أصليتين مكتوبتين بكل من اللغه العربية و اللغه الإنجليزية و استلم كل طرف نسخه
                للعمل بموجبها و في حالة وجود أي تعارض بين النص العربي و الإنجليزي يعتمد النص العربي بما يزيل ذلك التعارض
                .
                <br/>
                ويقر الطرف الثاني بإطلاعه على كامل مواد و بنود العقد وفهمها وعلمها العلم النافي للجهالة

            </td>
            <td class="en ltr" style="width: 50%; text-align: left; font-size: 12px; vertical-align: top">
                This Agreement has been edited in two original copies written in both Arabic and English, each party has
                received one original copy to act accordingly. In case of discrepancy the Arabic text shall prevail. <br/>
                The Second Party confirm they viewed all the articles and clauses of the contract, understood them
                thoroughly and carefully

            </td>
        </tr>
        <tr>
            <td style="width: 50%; text-align: center;  font-size: 14px; line-height: 24px">
                <strong>
                    المرفقات
                </strong>
            </td>

            <td class="en ltr" style="width: 50%; text-align: center;  font-size: 14px;line-height: 24px"><strong>
                    ATTACHMENTS
                </strong>
            </td>
        </tr>
        <tr>
            <td style="width: 50%; text-align: right;  font-size: 12px; vertical-align: top">
                الملحق رقم 1:<br/>
                أ‌) الشروط التجارية والشروط الأخرى


            </td>
            <td class="en ltr" style="width: 50%; text-align: left; font-size: 12px; vertical-align: top">
                Annexure-I<br/>
                a)	Commercial and other terms


            </td>
        </tr>
        <tr>
            <td style="width: 50%; text-align: right;  font-size: 12px; vertical-align: top">
                الملحق رقم 2 :<br/>
                ا) امر العمل المعتمد والموقع بواسطة الطرفين<br/>
                ب ) إن ارفاق الوصف الوظيفي للموظف مع امر العمل الزامي



            </td>
            <td class="en ltr" style="width: 50%; text-align: left; font-size: 12px; vertical-align: top">
                Annexure-II <br/>
                a)	Job Order accepted and signed by both parties<br/>
                b)	Job Description mandatory to attach with Job Order


            </td>
        </tr>
        </tbody>
    </table>
    <br>

</main>
<main>
    <br>
    <br>
    <table style="line-height: 26px">

        <tbody>
        <tr>
            <td style="width: 50%; text-align: center;  font-size: 12px; vertical-align: top ; direction: rtl">

                المفوض بالتوقیع <br/><br/><br/>

                عن (الطرف الأول)


            </td>
            <td class="en ltr" style="width: 50%; text-align: center; font-size: 12px; vertical-align: top">
                AUTHORIZED SIGNATORY
                <br/><br/><br/>

                (FIRST PARTY)


            </td>
        </tr>
        <tr>
            <td style="width: 50%; text-align: right;  font-size: 12px; vertical-align: middle ; direction: rtl">
                <br/>
                الاسم: السید/
                {{ $fnrco_flat_red_agreement->first_party }}

                <br/>
            </td>
            <td class="en ltr"
                style="width: 50%; text-align: left; font-size: 12px; vertical-align: middle;line-height: 30px">
                <br/>
                Name: MR/
                {{ $fnrco_flat_red_agreement->first_party_en }}

                <br/>
            </td>
        </tr>
        <tr>
            <td style="width: 50%; text-align: center;  font-size: 12px; vertical-align: top ; direction: rtl">

                (التوقيع والختم)

                <br> <br>
                <br> <br> <br> <br>

                التاریخ  {{ $fnrco_flat_red_agreement->date }}.

            </td>
            <td class="en ltr" style="width: 50%; text-align: center; font-size: 12px; vertical-align: top">
                (Signature and Stamp)

                <br> <br>
                <br> <br> <br> <br>


                Date:  {{ $fnrco_flat_red_agreement->date }}


            </td>
        </tr>
        </tbody>
    </table>
    <br>
    <br>
    <br>
    <br>

    <table style="line-height: 26px">

        <tbody>
        <tr>
            <td style="width: 50%; text-align: center; font-size: 14px; vertical-align: top; line-height: 18px">

                المفوض بالتوقیع <br/><br/><br/>

                عن (الطرف الثانى)


            </td>
            <td class="en ltr"
                style="width: 50%; text-align: center; font-size: 14px; vertical-align: top; line-height: 18px">
                AUTHORIZED SIGNATORY
                <br/><br/><br/>

                (SECOND PARTY)


            </td>
        </tr>
        <tr>
            <td style="width: 50%; text-align: right;  font-size: 12px; vertical-align: top ; direction: rtl">
                <br/>
                الاسم: السید/
                {{ $fnrco_flat_red_agreement->second_party }}

                <br/>
            </td>
            <td class="en ltr" style="width: 50%; text-align: left; font-size: 12px; vertical-align: top">
                <br/>
                Name: MR/
                {{ $fnrco_flat_red_agreement->second_party_en }}

                <br/>
            </td>
        </tr>
        <tr>
            <td style="width: 50%; text-align: center;  font-size: 12px; vertical-align: top ; direction: rtl">

                (التوقيع والختم)

                <br> <br>
                <br> <br> <br> <br>

                التاریخ {{ $fnrco_flat_red_agreement->date }}

            </td>
            <td class="en ltr" style="width: 50%; text-align: center; font-size: 12px; vertical-align: top">
                (Signature and Stamp)

                <br> <br>
                <br> <br> <br> <br>


                Date: {{ $fnrco_flat_red_agreement->date }}


            </td>
        </tr>
        </tbody>
    </table>
</main>
<main>
    <table class="ltr">
        <tbody>
        <tr>
            <td colspan="10" style="text-align: center">
                <strong> ANNEXURE- I </strong>
                <br/>
                ( Commercial and other terms accepted and signed by both parties )
            </td>
        </tr>
        <tr>
            <td colspan="10" style="text-align: left">
                <strong> I- COMMERCIAL TERMS (FEES) applicable in Saudi Riyals only </strong>
            </td>
        </tr>
        <tr>
            <td style="font-size: 12px;">SI #</td>
            <td style="font-size: 12px;">VISA CATEGORY</td>
            <td style="font-size: 12px;">VISA CATEGORY AVAILABLE</td>
            <td style="font-size: 12px;">VISA CATEGORY ARABIC</td>
            <td style="font-size: 12px;">NATIONALITY</td>
            <td style="font-size: 12px;">QTY</td>
            <td style="font-size: 12px;">BASIC SALARY</td>
            <td style="font-size: 12px;">FOOD ALLOWANCE</td>
            <td style="font-size: 12px;">MONTHLY CHARGES(PER HEAD)</td>
            <td style="font-size: 12px;">TOTAL MONTHLY CHARGES</td>
        </tr>
        @foreach($fnrco_flat_red_agreement->fnrcoFlatRedQuotation->fnrcoFlatRedQuotationRequests as $fnrco_flatRed_request)
            <tr>
                <td style="font-size: 12px;">{{ $fnrco_flatRed_request->id }}</td>
                <td style="font-size: 12px;">{{ $fnrco_flatRed_request->category }}</td>
                <td style="font-size: 12px;">{{ $fnrco_flatRed_request->visa_category_available }}</td>
                <td style="font-size: 12px;">{{ $fnrco_flatRed_request->visa_category_arabic }}</td>
                <td style="font-size: 12px;">{{ $fnrco_flatRed_request->nationality }}</td>
                <td style="font-size: 12px;">{{ $fnrco_flatRed_request->quantity }}</td>
                <td style="font-size: 12px;">{{ $fnrco_flatRed_request->salary }}</td>
                <td style="font-size: 12px;">{{ $fnrco_flatRed_request->Food_allowance }}</td>
                <td style="font-size: 12px;">{{ $fnrco_flatRed_request->value_per_employee_month }}</td>
                <td style="font-size: 12px;">{{ $fnrco_flatRed_request->total_value_per_month }}</td>
            </tr>
        @endforeach

        <tr>
            <td colspan="5" style="text-align: center"><strong>TOTAL QTY</strong></td>
            <td style="font-size: 12px;">{{ $total_quantity }}</td>
            <td colspan="3" style="text-align: center"><strong>TOTAL AMOUNT</strong></td>
            <td style="font-size: 12px;text-align: center">{{ $total_amount }}</td>
        </tr>
        <tr>
            <td colspan="10" style="text-align: center"><strong>THE ABOVE AMOUNT IS SUBJECT TO VAT</strong></td>
        </tr>
        <tr>
            <td colspan="10" style="text-align: left; font-size: 12px;line-height: 24px;">
                <strong> NOTES:</strong><br/>
                @foreach(json_decode($fnrco_flat_red_agreement->agreementFlatRedAnnexure->notes) as $note)
                    {!!$note."<br>"!!}
                @endforeach
                {{--1. Contracts Period : 24 Months<br/>--}}
                {{--2. Initial Mobilization Air Ticket by SECOND PARTY.<br/>--}}
                {{--3. Vacation Pay & End of Service (EOSB) will be settled by First Party before the departure of the--}}
                {{--candidate after--}}
                {{--receiving full payment from the Second Party<br/>--}}
                {{--4. Any variation in the above End of Service rate will be adjusted as actual.<br/>--}}
                {{--5. E-Wakala will be issued after receiving the deposit amount.<br/>--}}
                {{--6. First Party will provide Iqama, Gosi (Basic + HRA), Medical Insurance, Payroll Fee & ATM Card,--}}
                {{--Vacation Pay, Final Exit--}}
                {{--Air Ticket, EOSB & Exit Re-entry charges.--}}


            </td>
        </tr>


        </tbody>
    </table>
</main>
<main>
    <table class="ltr">
        <tbody>

        <tr>
            <td colspan="4" style="text-align: left">
                <strong> PARA - 02 (PAYMENT TERMS) </strong>
            </td>
        </tr>
        <tr>
            <td style="font-size: 12px;">SI#</td>
            <td style="font-size: 12px;">DESCRIPTION</td>
            <td style="font-size: 12px;">PAYMENT SETLLEMENT DUE</td>
            <td style="font-size: 12px;">AMOUNT</td>
        </tr>
        <tr>
            <td style="font-size: 12px;">1</td>
            <td style="font-size: 12px;text-align: left; line-height: 20px"><strong>Refundable Security Deposit
                    Payment:</strong> Second party has to
                provide Two (2)
                monthly fees as a security deposit payment via bank/cash/wire transfer for the total employees supplied
                by the FIRST PARTY to meet the salaries, FNRCO monthly fees and related expenses. This Refundable
                Security Deposit Payment will be refunded after completion of the Contract.
            </td>
            <td style="font-size: 12px;text-align: left">Within 10 days after signing the contract.</td>
            <td style="font-size: 12px;">{{ $total_amount * 2 }}</td>

        </tr>
        <tr>
            <td style="font-size: 12px;">2</td>
            <td style="font-size: 12px;text-align: left; line-height: 20px"><strong>Monthly invoicing:</strong> Monthly
                Invoices on pro-rata basis shall be
                submitted by FIRST PARTY on or before 21st of the month and paid by SECOND PARTY on or before 27th of
                the same month during the period of contract to enable timely salary payments to the employees. Monthly
                approved Time Sheet shall be provided by the SECOND PARTY on or before 16th of every month and OT time
                sheet if any, shall be provided along with subsequent months’ Time Sheet.
            </td>
            <td style="font-size: 12px;text-align: left">On or before 27th of the same month</td>
            <td style="font-size: 12px;">{{ $total_amount }}</td>

        </tr>
        <tr>
            <td style="font-size: 12px;">3</td>
            <td style="font-size: 12px;text-align: left; line-height: 20px"><strong>Other charges:</strong> Charges such
                as overseas agency e-wakala, power
                of attorney, visa stamping, immigration clearance charges (if any) related documentation and if any
                optional and additional services like Driving License, Any Chamber Attestation Fee related to any
                documents or employee, Visas, Multiple entry visa, educational certificate attestation and MOH/Saudi
                Council enrollment trade certificates, Family visas shall be charged to the SECOND PARTY. Any specified
                trade test in Overseas/Local such as Welders, etc. charges, fees or payment shall be paid by SECOND
                PARTY with actual cost.
            </td>
            <td style="font-size: 12px;">With the monthly invoice</td>
            <td style="font-size: 12px;"> ACTUAL</td>

        </tr>
        <tr>
            <td colspan="4" style="text-align: left">
                <strong> II. GENERAL TERMS: </strong>
            </td>
        </tr>

        @foreach(json_decode($fnrco_flat_red_agreement->agreementFlatRedAnnexure->general_terms) as $general_term)
            <tr>
                <td colspan="4" style="text-align: left">
                    {!!$general_term."<br>"!!}
                </td>
            </tr>
        @endforeach
        {{--<tr>--}}
        {{--<td colspan="4" style="text-align: left">--}}
        {{--1. In case of split arrival of candidates, if the candidates arrive after 15th of month, their payroll--}}
        {{--will be settled by second party and will be adjusted in subsequent month.--}}
        {{--</td>--}}
        {{--</tr>--}}
        {{--<tr>--}}
        {{--<td colspan="4" style="text-align: left">--}}
        {{--2. Profession change shall be considered as per MOL regulations.--}}
        {{--</td>--}}
        {{--</tr>--}}

        <tr>
            <td colspan="4" style="text-align: left">
                <strong> A) RECRUITMENT PROCEDURE: </strong>
            </td>
        </tr>
        @foreach(json_decode($fnrco_flat_red_agreement->agreementFlatRedAnnexure->recruitment_procedure) as $recruitment_procedure)
            <tr>
                <td colspan="4" style="text-align: left">
                    {!!$recruitment_procedure."<br>"!!}
                </td>
            </tr>
        @endforeach
        <tr>
            <td colspan="4" style="text-align: left">
                <strong> B) POST RECRUIMENT PROCEDURE: </strong>
            </td>
        </tr>
        @foreach(json_decode($fnrco_flat_red_agreement->agreementFlatRedAnnexure->post_recruiment_procedure) as $post_recruiment_procedure)
            <tr>
                <td colspan="4" style="text-align: left">
                    {!!$post_recruiment_procedure."<br>"!!}
                </td>
            </tr>
        @endforeach
        {{--<tr>--}}
        {{--<td colspan="4" style="text-align: left">--}}
        {{--2 Medical for Iqama shall be undertaken by SECOND PARTY from any CCHI approved clinics/hospitals. Such--}}
        {{--valid medical report to be submitted by SECOND PARTY within three (3) working days upon arrival of each--}}
        {{--employee.--}}
        {{--</td>--}}
        {{--</tr>--}}


        <tr>
            <td colspan="4" style="text-align: left">
                <strong> III. PAYMENT DEFAULT:</strong>
            </td>
        </tr>
        @foreach(json_decode($fnrco_flat_red_agreement->agreementFlatRedAnnexure->payment_default) as $payment_default)
            <tr>
                <td colspan="4" style="text-align: left">
                    {!!$payment_default."<br>"!!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="page_break"></div>
    <table class="ltr">
        <tbody>

        <tr>
            <td colspan="4" style="text-align: left">
                <strong>V. INFORMATION SHEET </strong>
            </td>
        </tr>
        <tr>
            <td colspan="4" style="text-align: left">
                <strong style="padding-left: 10px;">A) FIRST PARTY - Information Sheet
                    NAME</strong>
            </td>
        </tr>
        <tr>
            <td style="font-size: 12px;">1</td>
            <td style="font-size: 12px;text-align: left">NAME OF THE COMPANY</td>
            <td colspan="2" style="font-size: 12px;">First National Human Resources Company</td>

        </tr>
        <tr>
            <td style="font-size: 12px;">2</td>
            <td style="font-size: 12px;text-align: left">ADDRESS</td>
            <td colspan="2" style="font-size: 12px;">Umar Ibn Abdulaziz Road</td>

        </tr>
        <tr>
            <td style="font-size: 12px;">3</td>
            <td style="font-size: 12px;text-align: left">HEAD OFFICE LOCATION</td>
            <td colspan="2" style="font-size: 12px;">Al Malaz Riyadh, Kingdom of Saudi Arabia</td>

        </tr>
        <tr>
            <td style="font-size: 12px;">4</td>
            <td style="font-size: 12px;text-align: left">COMPANY REGISTRATION / CR NUMBER</td>
            <td colspan="2" style="font-size: 12px;">1010305364</td>

        </tr>
        <tr>
            <td rowspan="4" style="font-size: 12px;">5</td>
            <td rowspan="4" style="font-size: 12px;text-align: left">Authorized Project Representative</td>
            <td style="font-size: 12px;text-align: left">NAME</td>
            <td style="font-size: 12px;">IT DEPENDS ON SALES REPRESENTATIVE</td>
        </tr>
        <tr>
            <td  style="font-size: 12px;text-align: left">DESIGNATION</td>
            <td style="font-size: 12px;">IT DEPENDS ON SALES REPRESENTATIVE</td>

        </tr>
        <tr>
            <td style="font-size: 12px;text-align: left">CONTACT NUMBER</td>
            <td style="font-size: 12px;">IT DEPENDS ON SALES REPRESENTATIVE</td>

        </tr>
        <tr>
            <td  style="font-size: 12px;text-align: left">E-MAIL ADDRESS</td>
            <td  style="font-size: 12px;">IT DEPENDS ON SALES REPRESENTATIVE</td>

        </tr>

        <tr>
            <td rowspan="4" style="font-size: 12px;">6</td>
            <td rowspan="4" style="font-size: 12px;text-align: left">Authorized Accounts Representative</td>
            <td style="font-size: 12px;text-align: left">NAME</td>
            <td style="font-size: 12px;">Ashraf Atta</td>
        </tr>
        <tr>
            <td  style="font-size: 12px;text-align: left">DESIGNATION</td>
            <td style="font-size: 12px;">Accounts Manager</td>

        </tr>
        <tr>
            <td style="font-size: 12px;text-align: left">CONTACT NUMBER</td>
            <td style="font-size: 12px;">533010449</td>

        </tr>
        <tr>
            <td  style="font-size: 12px;text-align: left">E-MAIL ADDRESS</td>
            <td  style="font-size: 12px;">ashraf.atta@fnrco.com.sa</td>

        </tr>
        <tr>
            <td rowspan="4" style="font-size: 12px;">7</td>
            <td rowspan="4" style="font-size: 12px;text-align: left">Bank Details for Transactions</td>
            <td style="font-size: 12px;text-align: left">NAME OF BENEFICIARY</td>
            <td style="font-size: 12px;">FNSC</td>
        </tr>
        <tr>
            <td  style="font-size: 12px;text-align: left">NAME OF BANK</td>
            <td style="font-size: 12px;">AL RAJHI BANK</td>

        </tr>
        <tr>
            <td style="font-size: 12px;text-align: left">BRANCH</td>
            <td style="font-size: 12px;">MUSHRIFA BRANCH RIYADH</td>

        </tr>
        <tr>
            <td  style="font-size: 12px;text-align: left">TYPE OF ACCOUNT</td>
            <td  style="font-size: 12px;">CURRENT</td>
        </tr>
        <tr>
            <td  style="font-size: 12px;text-align: left">ACCOUNT NUMBER</td>
            <td  style="font-size: 12px;">204-608-010-8310</td>
        </tr>
        <tr>
            <td  style="font-size: 12px;text-align: left">IBAN NUMBER</td>
            <td  style="font-size: 12px;">SA96800002046080108310</td>
        </tr>

        <tr>
            <td colspan="4" style="font-size: 12px;text-align: left"><strong>B) SECOND PARTY - Information Sheet</strong></td>


        </tr>
        <tr>
            <td style="font-size: 12px">1</td>
            <td style="font-size: 12px;text-align: left">NAME OF THE COMPANY</td>
            <td colspan="2" style="font-size: 12px;">{{ $fnrco_flat_red_agreement->company->name }}</td>
        </tr>
        <tr>
            <td style="font-size: 12px">2</td>
            <td style="font-size: 12px;text-align: left">ADDRESS</td>
            <td colspan="2" style="font-size: 12px;">{{ $fnrco_flat_red_agreement->address_en }}</td>
        </tr>
        <tr>
            <td style="font-size: 12px">3</td>
            <td style="font-size: 12px;text-align: left">HEAD OFFICE LOCATION</td>
            <td colspan="2" style="font-size: 12px;">{{ $fnrco_flat_red_agreement->location }}</td>
        </tr>
        <tr>
            <td style="font-size: 12px">4</td>
            <td style="font-size: 12px;text-align: left">COMPANY REGISTRATION / CR NUMBER</td>
            <td colspan="2" style="font-size: 12px;">{{ $fnrco_flat_red_agreement->company->cr }}</td>
        </tr>

        <tr>
            <td rowspan="4" style="font-size: 12px;">5</td>
            <td rowspan="4" style="font-size: 12px;text-align: left">Authorized Project Representative</td>
            <td style="font-size: 12px;text-align: left">NAME</td>
            <td style="font-size: 12px;">{{ $fnrco_flat_red_agreement->agreementFlatRedAnnexure->second_project_representative_name }}</td>
        </tr>
        <tr>
            <td  style="font-size: 12px;text-align: left">DESIGNATION</td>
            <td style="font-size: 12px;">{{ $fnrco_flat_red_agreement->agreementFlatRedAnnexure->second_project_representative_designation }}</td>

        </tr>
        <tr>
            <td style="font-size: 12px;text-align: left">CONTACT NUMBER</td>
            <td style="font-size: 12px;">{{ $fnrco_flat_red_agreement->agreementFlatRedAnnexure->second_project_representative_contact_num }}</td>

        </tr>
        <tr>
            <td  style="font-size: 12px;text-align: left">E-MAIL ADDRESS</td>
            <td  style="font-size: 12px;">{{ $fnrco_flat_red_agreement->agreementFlatRedAnnexure->second_project_representative_email }}</td>

        </tr>

        <tr>
            <td rowspan="4" style="font-size: 12px;">6</td>
            <td rowspan="4" style="font-size: 12px;text-align: left">Authorized Accounts Representative</td>
            <td style="font-size: 12px;text-align: left">NAME</td>
            <td style="font-size: 12px;">{{ $fnrco_flat_red_agreement->agreementFlatRedAnnexure->second_account_representative_name }}</td>
        </tr>
        <tr>
            <td  style="font-size: 12px;text-align: left">DESIGNATION</td>
            <td style="font-size: 12px;">{{ $fnrco_flat_red_agreement->agreementFlatRedAnnexure->second_account_representative_designation }}</td>

        </tr>
        <tr>
            <td style="font-size: 12px;text-align: left">CONTACT NUMBER</td>
            <td style="font-size: 12px;">{{ $fnrco_flat_red_agreement->agreementFlatRedAnnexure->second_account_representative_contact_num }}</td>

        </tr>
        <tr>
            <td  style="font-size: 12px;text-align: left">E-MAIL ADDRESS</td>
            <td  style="font-size: 12px;">{{ $fnrco_flat_red_agreement->agreementFlatRedAnnexure->second_account_representative_email }}</td>

        </tr>
        <tr>
            <td rowspan="4" style="font-size: 12px;">7</td>
            <td rowspan="4" style="font-size: 12px;text-align: left">Bank Details for Transactions</td>
            <td style="font-size: 12px;text-align: left">NAME OF BENEFICIARY</td>
            <td style="font-size: 12px;">{{ $fnrco_flat_red_agreement->agreementFlatRedAnnexure->second_bank_name_beneficiary }}</td>
        </tr>
        <tr>
            <td  style="font-size: 12px;text-align: left">NAME OF BANK</td>
            <td style="font-size: 12px;">{{ $fnrco_flat_red_agreement->agreementFlatRedAnnexure->second_bank_name }}</td>

        </tr>
        <tr>
            <td style="font-size: 12px;text-align: left">BRANCH</td>
            <td style="font-size: 12px;">{{ $fnrco_flat_red_agreement->agreementFlatRedAnnexure->second_bank_branch }}</td>

        </tr>
        <tr>
            <td  style="font-size: 12px;text-align: left">TYPE OF ACCOUNT</td>
            <td  style="font-size: 12px;">{{ $fnrco_flat_red_agreement->agreementFlatRedAnnexure->second_bank_type_account }}</td>

        </tr>
        <tr>
            <td  style="font-size: 12px;text-align: left">ACCOUNT NUMBER</td>
            <td  style="font-size: 12px;">{{ $fnrco_flat_red_agreement->agreementFlatRedAnnexure->second_bank_account_num }}</td>

        </tr>
        <tr>
            <td  style="font-size: 12px;text-align: left">IBAN NUMBER</td>
            <td  style="font-size: 12px;">{{ $fnrco_flat_red_agreement->agreementFlatRedAnnexure->second_bank_iban_num }}</td>

        </tr>
        </tbody>
    </table>
    <div class="page_break"></div>

    <table class="ltr">
        <tbody>
        <tr>
            <td colspan="4" style="text-align: left">
                <strong>VI. AUTHORIZE SIGNATURE</strong>
            </td>
        </tr>
        <tr>
            <td colspan="2" style="text-align: center">
                <strong>FIRST PARTY</strong>
            </td>
            <td colspan="2" style="text-align: center">
                <strong>SECOND PARTY</strong>
            </td>
        </tr>
        <tr>
            <td colspan="2" style="text-align: left; text-decoration: underline; border: none;">
                <strong>SALES DEPARTMENT</strong>
            </td>
            <td colspan="2" style="text-align: left; text-decoration: underline; border: none;">
                <strong>HR/OPERATION DEPARTMENT</strong>
            </td>
        </tr>
        <tr>
            <td style="text-align: left; border: none; line-height: 20px">
                NAME
            </td>
            <td style="text-align: left; border: none;line-height: 20px">
                HUSSEIN SALEH
            </td>
            <td style="text-align: left; border: none;line-height: 20px">
                NAME
            </td>
            <td style="text-align: left; border: none;line-height: 20px">
                {{ $fnrco_flat_red_agreement->agreementFlatRedAnnexure->hr_name }}
            </td>
        </tr>
        <tr>
            <td style="text-align: left; border: none;line-height: 20px">
                DESIGNATION:
            </td>
            <td style="text-align: left; border: none;line-height: 20px">
                HEAD OF CORPORATE SALES
            </td>
            <td style="text-align: left; border: none;line-height: 20px">
                DESIGNATION:
            </td>
            <td style="text-align: left; border: none;line-height: 20px">
                {{ $fnrco_flat_red_agreement->agreementFlatRedAnnexure->hr_designation }}
            </td>
        </tr>
        <tr>
            <td style="text-align: left; border: none;line-height: 40px">
                SIGNATURE:
            </td>
            <td style="text-align: left; border: none;line-height: 30px">

            </td>
            <td style="text-align: left; border: none;line-height: 30px">
                SIGNATURE:
            </td>
            <td style="text-align: left; border: none;line-height: 30px">

            </td>
        </tr>
        </tbody>
    </table>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>

    <table class="ltr">
        <tbody>
        <tr>
            <td colspan="2" style="text-align: left; text-decoration: underline; border: none;">
                <strong>FINANCE DEPARTMENT</strong>
            </td>
            <td colspan="2" style="text-align: left; text-decoration: underline; border: none;">
                <strong>FINANCE DEPARTMENT</strong>
            </td>
        </tr>
        <tr>
            <td style="text-align: left; border: none; line-height: 20px">
                NAME
            </td>
            <td style="text-align: left; border: none;line-height: 20px">
                MOHAMMED BESHR
            </td>
            <td style="text-align: left; border: none;line-height: 20px">
                NAME
            </td>
            <td style="text-align: left; border: none;line-height: 20px">
                {{ $fnrco_flat_red_agreement->agreementFlatRedAnnexure->finance_name }}
            </td>
        </tr>
        <tr>
            <td style="text-align: left; border: none;line-height: 20px">
                DESIGNATION:
            </td>
            <td style="text-align: left; border: none;line-height: 20px">
                FINANCE MANAGER
            </td>
            <td style="text-align: left; border: none;line-height: 20px">
                DESIGNATION:
            </td>
            <td style="text-align: left; border: none;line-height: 20px">
                {{ $fnrco_flat_red_agreement->agreementFlatRedAnnexure->finance_designation }}
            </td>
        </tr>
        <tr>
            <td style="text-align: left; border: none;line-height: 40px">
                SIGNATURE:
            </td>
            <td style="text-align: left; border: none;line-height: 30px">

            </td>
            <td style="text-align: left; border: none;line-height: 30px">
                SIGNATURE:
            </td>
            <td style="text-align: left; border: none;line-height: 30px">

            </td>
        </tr>
        </tbody>
    </table>

    <br/>
    <br/>
    <br/>
    <br/>
    <br/>

    <table class="ltr">
        <tbody>
        <tr>
            <td colspan="2" style="text-align: left; text-decoration: underline; border: none;">
                <strong>APPROVED BY</strong>
            </td>
            <td colspan="2" style="text-align: left; text-decoration: underline; border: none;">
                <strong>APPROVED BY</strong>
            </td>
        </tr>
        <tr>
            <td style="text-align: left; border: none; line-height: 20px">
                NAME
            </td>
            <td style="text-align: left; border: none;line-height: 20px">
                AYED TURKI ALI
            </td>
            <td style="text-align: left; border: none;line-height: 20px">
                NAME
            </td>
            <td style="text-align: left; border: none;line-height: 20px">
                {{ $fnrco_flat_red_agreement->agreementFlatRedAnnexure->approved_by_name }}
            </td>
        </tr>
        <tr>
            <td style="text-align: left; border: none;line-height: 20px">
                DESIGNATION:
            </td>
            <td style="text-align: left; border: none;line-height: 20px">
                DEPUTY GENERAL MANAGER
            </td>
            <td style="text-align: left; border: none;line-height: 20px">
                DESIGNATION:
            </td>
            <td style="text-align: left; border: none;line-height: 20px">
                {{ $fnrco_flat_red_agreement->agreementFlatRedAnnexure->approved_by_designation }}
            </td>
        </tr>
        <tr>
            <td style="text-align: left; border: none;line-height: 40px">
                SIGNATURE:
            </td>
            <td style="text-align: left; border: none;line-height: 30px">

            </td>
            <td style="text-align: left; border: none;line-height: 30px">
                SIGNATURE:
            </td>
            <td style="text-align: left; border: none;line-height: 30px">

            </td>
        </tr>
        <tr>
            <td style="text-align: left; border: none;line-height: 30px">
                STAMP:
            </td>
            <td style="text-align: left; border: none;line-height: 30px">

            </td>
            <td style="text-align: left; border: none;line-height: 30px">
                STAMP:
            </td>
            <td style="text-align: left; border: none;line-height: 30px">

            </td>
        </tr>
        <tr>
            <td colspan="4" style="text-align: left; border: none;line-height: 80px">
                &nbsp;
            </td>

        </tr>
        <tr>
            <td style="text-align: left; border: none;line-height: 30px">
                DATE:
            </td>
            <td style="text-align: left; border: none;line-height: 30px">
                {{ $fnrco_flat_red_agreement->date }}
            </td>
            <td style="text-align: left; border: none;line-height: 30px">
                DATE:
            </td>
            <td style="text-align: left; border: none;line-height: 30px">
                {{ $fnrco_flat_red_agreement->date }}
            </td>
        </tr>
        </tbody>
    </table>


</main>
</body>
</html>
