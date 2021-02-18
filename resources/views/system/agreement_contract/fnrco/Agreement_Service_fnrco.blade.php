<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en" dir="rtl">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>Agreement Service</title>
    <style>
        @page {
            margin: 90px 20px;
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
    </style>
</head>


<body dir="rtl">

<htmlpageheader name="page-header">
    <header><img style="width: 100%" src="http://alwatnia.com.sa/demo/linrcopdf/fhead.jpg"></header>
</htmlpageheader>

<htmlpagefooter name="page-footer">

    <footer><img style="width: 100%" src="http://alwatnia.com.sa/demo/linrcopdf/ffoot.jpg"></footer>
</htmlpagefooter>


<main>

    <table style="line-height: 22px">

        <tbody>
        <tr>
            <td style="width: 50%; text-align: center;  font-size: 14px; line-height: 24px">
                <strong>عقد تقديم خدمات <br>
                    تم إبرام هذه العقد بين كلاً من
                    <span class="en">: -</span></strong>
            </td>

            <td class="en ltr" style="width: 50%; text-align: center;  font-size: 14px;line-height: 24px"><strong>Agreement
                    Service<br>
                    This contract is executed and entered between:</strong>
            </td>
        </tr>
        <tr>
            <td style="width: 50%; text-align: right;  font-size: 12px; vertical-align: top">
                <span class="en">  1.</span>
                الشركة الوطنية الأولى للموارد البشرية شركة سعودية مساهمه مقفلة سجل تجاري رقم
                <span class="en">١٠١٠٣٥٣٦٤</span>
                و يمثلها في التوقيع على هذا العقد السيد
                <span class="en">/</span>
                علي جابر ذيب بصفته المدير العام <span class="en">،</span> العنوان المملكة العربية السعودية مدينة الرياض
                <span class="en">،</span> حي الملز
                <span class="en">،</span>
                ١١٣٤٢
                ص
                <span class="en">.</span>
                ب
                <span class="en">٢٦١٦٥٦</span><br><br>
                الهاتف
                <span class="en">: 47724510096611</span><br>
                فاكس
                <span class="en"> : 00966112457248</span><br>
                ويشار إليها في هذا العقد بالطرف الأول


            </td>
            <td class="en ltr" style="width: 50%; text-align: left; font-size: 12px; vertical-align: top">
                1. The First National Company, a Saudi Closed Joint Stock Company, Commercial Registration #:101035364,
                and represented in signing hereon by Mr. Ali Jaber Deeb in his capacity as General Manager.
                Address: Riyadh, AL MALAZ, 11342, P.O BOX 261656, Kingdom of Saudi Arabia.<br>
                Tel.: 00966114772451<br>
                Fax: 00966112457248<br>
                (hereinafter called the FIRST PARTY)


            </td>
        </tr>
        <tr>
            <td style="width: 50%; text-align: right;  font-size: 12px; vertical-align: top">
                <span class="en"> 2.</span>
                <span class="en">  {{ $fnrco_agreement->company->name }}</span>
                و هي شركة عاملة مسجلة تحت نظام وزارة التجارة و الإستثمار في المملكة
                العربية السعودية بموجب السجل التجاري رقم
                <span class="en"> {{ $fnrco_agreement->company->cr }}</span>
                تاريخ
                <span class="en"> {{ $fnrco_agreement->cr_date }}</span>
                ونظام وزارة الموارد البشرية و التنمية
                الاجتماعية بالرقم
                <span class="en">{{ $fnrco_agreement->hr_system }}</span>
                و يمثلها بالتوقيع على هذا العقد السيد
                <span class="en">{{ $fnrco_agreement->signing_by }}</span>
                بصفته
                <span class="en">{{ $fnrco_agreement->by_as }}</span><br>
                العنوان
                <span class="en">: {{ $fnrco_agreement->address_ar }}</span><br>
                الهاتف
                <span class="en">{{ $fnrco_agreement->phone }}</span><br>
                فاكس
                <span class="en">{{ $fnrco_agreement->fax }}</span><br>
                العنوان البريدي
                <span class="en">{{ $fnrco_agreement->mailing_address }}</span><br>
                الرمز البريدي
                <span class="en">{{ $fnrco_agreement->postal_code }}</span><br>
                عنوان البريد الإلكتروني
                <span class="en">: {{ $fnrco_agreement->company->email }}</span><br>
                <span class="en">(</span>
                ويشار إليها في هذا العقد بالطرف الثاني
                <span class="en">)</span>


            </td>
            <td class="en ltr" style="width: 50%; text-align: left; font-size: 12px; vertical-align: top">
                2. {{ $fnrco_agreement->company->name }} It is a company operating and registered under the system of the Ministry
                of Commerce and Investment in the Kingdom of Saudi Arabia under the commercial registration No {{ $fnrco_agreement->company->cr }}
                Date/ {{ $fnrco_agreement->cr_date }} and the law of the Ministry of Human Resources and Social Development under No/ {{ $fnrco_agreement->hr_system }} and
                represented in signing hereon by Mr./ {{ $fnrco_agreement->signing_by }} ID number/ in his capacity as {{ $fnrco_agreement->by_as }}<br>
                Address: {{ $fnrco_agreement->address_en }}<br>
                Phone: {{ $fnrco_agreement->phone }}<br>
                Fax: {{ $fnrco_agreement->fax }}<br>
                Mailing Address: {{ $fnrco_agreement->mailing_address }}<br>
                Postal code: {{ $fnrco_agreement->postal_code }}<br>
                E-mail address:  {{ $fnrco_agreement->company->email }}<br>
                (Referred to in this contract as the Second Party)


            </td>
        </tr>
        <tr>
            <td style="width: 50%; text-align: center;  font-size: 14px; line-height: 24px;background:#ddd">
                <strong>
                    مقدمه
                </strong>
            </td>

            <td class="en ltr"
                style="width: 50%; text-align: center;  font-size: 14px;line-height: 24px;background:#ddd"><strong>Introduction</strong>
            </td>
        </tr>
        <tr>
            <td style="width: 50%; text-align: right;  font-size: 12px; vertical-align: top">

                حيث إن الطرف الأول مرخص من قبل الجهات المختصة للعمل في مجال تقديم الخدمات العمالية للغير ولديه الخبرة
                والإمكانيات اللازمة لتقديم الخدمات التي يطلبها الغير وفق الأنظمة واللوائح المعمول بها في المملكة العربية
                السعودية<span class="en">،</span> وحيث أن الطرف الثاني يرغب في الاستفادة من خدمات الطرف الأول وذلك في
                الحصول على خدمات العمالة
                للعمل لديه وتحت مسئوليته ووفق الأنظمة المعمول بها في المملكة العربية السعودية بنظام أجير <span
                        class="en">.</span>
                وبناء على تطابق الإيجاب والقبول بين الطرفين<span class="en">،</span> فقد أبرم الطرفان هذا العقد وهما
                بكامل الأهلية المعتبرة
                لإبرام العقود شرعاً ونظاماً واعتبرا أن المقدمة أعلاه جزءاً لا يتجزأ من العقد وتم الاتفاق بينهما على ما
                يلي
                <span class="en">:-</span>


            </td>
            <td class="en ltr" style="width: 50%; text-align: left; font-size: 12px; vertical-align: top">
                Introduction As the First Party is licensed by the competent authorities to work in the field of
                providing workforce services to other parties and has the necessary expertise and capabilities to
                provide the services required in accordance with the laws and regulations in force in the Kingdom of
                Saudi Arabia, and where the Second Party wishes to benefit from the services of the First Party in
                obtaining workforce services to work for it and under its responsibility and in accordance with the
                regulations in force in the Kingdom of Saudi Arabia in Ajeer Program. And based on the matching of
                acceptance and consent between the two parties, this contract was concluded by the two parties and they
                have the full competence legally and statutorily to conclude contracts legally and in considered that
                the above introduction is an integral part of the contract and they agreed on the following:


            </td>
        </tr>
        <tr>
            <td style="width: 50%; text-align: center;  font-size: 14px; line-height: 24px;background:#ddd">
                <strong>
                    موضوع الإتفاقية
                </strong>
            </td>

            <td class="en ltr"
                style="width: 50%; text-align: center;  font-size: 14px;line-height: 24px;background:#ddd"><strong>SUBJECT
                    OF AGREEMENT</strong>
            </td>
        </tr>
        <tr>
            <td style="width: 50%; text-align: right;  font-size: 12px; vertical-align: top">
                <span class="en">.</span>
                يقوم الطرف الأول بتوفير الخدمات العمالية التالية

                <span class="en">:-</span> <br/>
                <span class="en"> ---------------------------------------------------------------
</span>


            </td>
            <td class="en ltr" style="width: 50%; text-align: left; font-size: 12px; vertical-align: top">
                The FIRST PARTY to provide the services of Manpower Support and Services of:
                <br/>
                ---------------------------------------------------------------


            </td>
        </tr>
        <tr>
            <td style="width: 50%; text-align: center;  font-size: 14px; line-height: 24px;background:#ddd">
                <strong>
                    إلتزمات الطرف الأول
                </strong>
            </td>

            <td class="en ltr"
                style="width: 50%; text-align: center;  font-size: 14px;line-height: 24px;background:#ddd"><strong>FIRST
                    PARTY OBLIGATIONS</strong>
            </td>
        </tr>
        <tr>
            <td style="width: 50%; text-align: right;  font-size: 12px; vertical-align: top">
                يلتزم الطرف الأول باتخاذ كافة الترتيبات اللازمة المتعلقة بإنهاء إجراءات الإقامة وتراخيص العمل والتأمين
                الطبي وتوزيع الرواتب<span class="en">.</span> وذلك بعد إستلام كافة المستحقات الخاصة بهذه العمالة من
                الطرف الثاني وفي حالة وجود
                أي غرامات أو مخالفات تنتج عن تأخير الطرف الثاني في السداد فيتحملها الطرف الثاني منفرداً

                <span class="en">.</span>

            </td>
            <td class="en ltr" style="width: 50%; text-align: left; font-size: 12px; vertical-align: top">
                The FIRST PARTY shall undertake all the necessary arrangements pertaining to Iqama process, work permit,
                medical insurance, and salary.
                And that is after receiving all the dues for this employment from the second party, and in the event of
                any fines or violations resulting from the delay of the second party in payment, the second party shall
                bear them individually.


            </td>
        </tr>
        <tr>
            <td style="width: 50%; text-align: center;  font-size: 14px; line-height: 24px;background:#ddd">
                <strong>
                    إلتزمات الطرف الثاني
                </strong>
            </td>

            <td class="en ltr"
                style="width: 50%; text-align: center;  font-size: 14px;line-height: 24px;background:#ddd"><strong>SECOND
                    PARTY OBLIGATIONS</strong>
            </td>
        </tr>
        <tr>
            <td style="width: 50%; text-align: right;  font-size: 12px; vertical-align: top">
                <span class="en">1.</span>
                يلتزم الطرف الثاني بتوفير صورة من السجل التجاري وشهادة الزكاة وصورة شهادة التوطين وصورة بطاقة و هوية
                ملاك المنشأة و صورة من عقد تأسيس الشركة أو النظام الأساسي للطرف الأول متى طلب منه ذلك وكذلك صورة من
                تفويض الشخص المخول بتوقيع هذا العقد مصدقة من الغرفة التجارية إلى الطرف الأول عند التوقيع على هذا العقد
                <span class="en">.</span>


            </td>
            <td class="en ltr" style="width: 50%; text-align: left; font-size: 12px; vertical-align: top">
                1.The Second Party is obliged to provide a copy of the commercial registration, the Zakat certificate, a
                copy of the Saudization certificate, a copy of the signatory ID card, and a copy of the company’s
                memorandum of association or articles of association of the first party whenever requested to do so, as
                well as a copy of the authorization of the person authorized to sign this contract certified by the
                Chamber of Commerce to the First Party when signing the this contract.

            </td>
        </tr>
        <tr>
            <td style="width: 50%; text-align: right;  font-size: 12px; vertical-align: top">
                <span class="en">2.</span>

                يلتزم الطرف الثاني بالمحافظة على <span class="en">:-</span><br/>
                <span class="en">أ)</span>
                نسبة التوطين حسب متطلبات وزارة الموارد البشريه والتنميه
                الاجتماعيه وجميع أنظمة واشتراطات الوزارة وبرنامج أجير
                <span class="en">،</span>
                وفي حال عدم التزام الطرف الثاني بذلك عليه إشعار
                الطرف الأول فوراً بأي تغيير يطرأ عليه بعد التعاقد مما يعد مخالفا لهذه الأنظمة والاشتراطات
                <span class="en">،</span>
                ويتحمل الطرف
                الثاني وحده جميع التبعات والغرامات المترتبة على ذلك كما يحق للطرف الأول الرجوع عليه ومطالبته بها<span
                        class="en">،</span> كما
                يحق للطرف الأول على إثر ذلك سحب العمالة وتحميل الطرف الثاني كافة الأتعاب المستحقة عليه عن الفترة السابقة
                بالإضافة إلى رسوم الإقامات ورخص العمل وأي رسوم حكومية أخرى مستحقة عن كامل فترة العقد<span
                        class="en">،</span> بالإضافة إلى
                <span class="en"> (50%)</span>
                خمسين بالمائة من الأتعاب الشهرية عن باقي فترة العقد
                <span class="en">.</span>
                وهذا متفق عليه بين الطرفين

                <span class="en">.</span>
<br/>
                <span class="en">ب) </span>
                يلتزم الطرف الثاني بتقديم أي وثيقة قانونية أخرى قد تكون مطلوبة بواسطة الحكومة السعودية للعمالة المستقدمة
                حتى وقت انتهاء أو إنهاء هذا العقد
                <span class="en">.</span>

            </td>
            <td class="en ltr" style="width: 50%; text-align: left; font-size: 12px; vertical-align: top">
                2. SECOND PARTY shall maintain:<br/>
                A) The percentage of Saudization according to the requirements of the Ministry of human resources &
                social development and all the Ministry’s regulations and requirements and Ajeer program. In the event
                that the Second Party does not adhere to this, he must immediately notify the First Party of any change
                that occurs after contracting, which is contrary to these regulations and requirements. The Second Party
                solely bears all the consequences and fines. The First Party also has the right to refer to it and claim
                it, and the First Party also has the right to withdraw the workforce and to charge the Second Party with
                all fees due on it for the previous period in addition to residence fees, work permits and any other
                government fees due for the entire contract period, in addition to fifteen percent (50%) of the monthly
                fees for the remainder of the contract period. And This is agreed upon between the two parties
<br/>
                b) The second party is obligated to provide any other legal documents required by the Saudi Government
                for the hired worker till the expiry/termination of this agreement.

            </td>
        </tr>

        <tr>
            <td style="width: 50%; text-align: right;  font-size: 12px; vertical-align: top">
                <span class="en">3.</span>
                يلتزم الطرف الثاني بتوفير خدمات النقل للعمالة المطلوبة خلال فترة التعاقد
                <span class="en">،</span>
                وتأمين معدات السلامة
                والوقاية الشخصية والتدريب لهم علي الاعمال المطلوبة منهم بالاضافة الي توفير أي معدات أو آليات قد تكون
                مطلوبة لتنفيذ الأعمال وإصدار الشهادات وبوالص التأمين اللازمة كتأمين المركبات وغيرها، كما يلتزم بتأمين
                السكن الملائم لهم أيضا كلاً حسب وظيفته

                <span class="en">.</span>
            </td>
            <td class="en ltr" style="width: 50%; text-align: left; font-size: 12px; vertical-align: top">
                3. The SECOND PARTY shall provide transportation for the hired workers during the period of the
                Contract, and shall also provide safety and personal protection and training them for the required tasks
                in addition to providing any equipment or machines that may be required to carry out the business and
                issue certificates and insurance policies needed such as vehicle insurance and other. In addition,
                providing appropriate accommodation, each according to his job.
            </td>
        </tr>
        <tr>
            <td style="width: 50%; text-align: right;  font-size: 12px; vertical-align: top">
                <span class="en">4.</span>
                يتحمل الطرف الثاني المسؤولية كاملة عن أيه تجاوزات تلحق ضرراً بالعمالة أو أي غرامات مترتبه لارتكاب
                العمالة لأي مخالفات للأنظمة المعمول بها داخل المملكة نتيجه توجيههم للعمل بأعمال غير نظامية او إهمالهم او
                توجيههم باستخدام معدات أو أليات او سيارات غير مصرح للعمالة باستخدامها مما يترتب عليه مخالفات أو غرامات
                أو إصابات وفي هذه الحالة يحق للطرف الأول إلغاء العقد وسحب العمالة و تحميل الطرف الثاني كافة التكاليف و
                الغرامات و الأحكام القضائية و القرارات القانونية المترتبه على هذه المخالفات . كما يحق للطرف الاول أيضاً
                مطالبة الطرف الثاني بالتعويض عن هذه التجاوزات أو الاضرار أو المخالفات في أي وقت حتي بعد إنتهاء أو فسخ
                هذا العقد
                <span class="en">.</span>


            </td>
            <td class="en ltr" style="width: 50%; text-align: left; font-size: 12px; vertical-align: top">
                4. The Second Party shall bears full liability for any violations that cause damage to labor force or
                any fines arising from the commission of labor force of a violation of the regulations within the
                Kingdom as a result of directing them to work in irregular activities or neglecting them or directing
                them to use equipment, mechanisms or cars that are not authorized to be used by them resulting in
                violations, fines or injuries. In this case, the First Party has the right to revoke the contract,
                withdraw the labor force and charge the Second Party with all costs, fines, judicial rulings, and legal
                decisions resulting from these violations. The first party also has the right to claim the second party
                for compensation for these damages, or violations at any time, even after the expiration or termination
                of this contract.
            </td>
        </tr>

        <tr>
            <td style="width: 50%; text-align: right;  font-size: 12px; vertical-align: top">
                <span class="en">5.</span>
                يلتزم الطرف الثاني في حال تغيب أو هروب أي عامل إبلاغ الطرف الأول كتابياً خلال مدة أقصاها
                <span class="en">(24)</span>
                أربعه و
                عشرون ساعه من وقت تغييب العمالة <span class="en">.</span> وإلا يتحمل الطرف الثاني منفرداً كافة الاثار
                القانونية والمالية أمام
                كافة الجهات الحكومية وامام الطرف الاول <span class="en">.</span> كما يتحمل الطرف الثاني كافة الاجراءات
                القانونية والغرامات
                والمخالفات في حالة تقديم العمالة لأي شكوي أمام أي جهه مختصة وتكون هذه الشكوي لسبب يرجع للطرف الثاني سواء
                بشكل مباشر أو غير مباشر
                <span class="en">.</span>


            </td>
            <td class="en ltr" style="width: 50%; text-align: left; font-size: 12px; vertical-align: top">
                5. In the event of the absence or escape of any worker, the Second Party shall notify the First Party in
                writing within a maximum period of twenty-four (24) hours from the time of the absence of the worker.
                Otherwise, the second party alone bears all the legal and financial implications in front of all
                government bodies and before the first party. The second party also bears all the legal procedures,
                fines and violations in the event that the worker submits any complaint to any competent authority, and
                this complaint is for a reason attributed to the second party, whether directly or indirectly.
            </td>
        </tr>

        <tr>
            <td style="width: 50%; text-align: right;  font-size: 12px; vertical-align: top">
                <span class="en">6.</span>
                يلتزم الطرف الثاني بتسليم الطرف الأول كل من بطاقة الإقامة وبطاقة التأمين الطبي لتجديدها قبل التاريخ
                المحدد لانتهائها<span class="en">،</span> أي قبل
                <span class="en">(45)</span>
                خمسة وأربعون يوماً من تاريخ الانتهاء كما يلتزم بالحضور هو أو من يمثله إذا
                استدعى الأمر لاستلام بطاقة الإقامة وبطاقة التأمين الطبي المجددة من الطرف الأول
                <span class="en">،</span> وفي حالة حدوث أي تأخير
                من جانب الطرف الثاني فعليه تحمل كافة الغرامات الناتجة عن ذلك
                <span class="en">.</span>
                <br/>
                <br/>
                ويلتزم الطرف الثاني أيضًا بإحضار العمالة لإجراء الفحص الطبي إذا لزم الأمر<span class="en">،</span> وفي
                حالة عدم الالتزام فإن
                الطرف الثاني يتحمل أية تكاليف علاجية مترتبة على ذلك<span class="en">.</span> ولايحق له في هذه الحالة
                المطالبة بالاستفادة من
                التأمين الطبي لعلاج العمالة<span class="en">.</span>


            </td>
            <td class="en ltr" style="width: 50%; text-align: left; font-size: 12px; vertical-align: top">
                6. The Second Party shall deliver the residence and medical insurance card to the First Party for its
                renewal, forty-five (45) days before the date set for its expiry, the Second Party or his
                representative, if necessary, is obliged to receive the residency card and the renewed medical insurance
                card. and in the event of non-compliance with that, the Second Party bears all the fines resulting from
                the delay.
                <br/>
                The second party is obliged to bring the labors to perform the medical examination if necessary, In the
                event of non-compliance, the Second Party bears any treatment costs that may result accordingly. In this
                case, he is not entitled to claim to benefit from medical insurance to treat employees.
            </td>
        </tr>

        <tr>
            <td style="width: 50%; text-align: right;  font-size: 12px; vertical-align: top">
                <span class="en">7.</span>
                في حال قيادة العمالة لمركبات الطرف الثاني، فيجب أن تكون جميع المركبات التي يقودها السائق باسم الطرف
                الثاني<span class="en">،</span> ومؤمن عليها تأميناً شاملاً لجميع الأطراف<span class="en">،</span> وإذا
                كان التأمين غير شامل لجميع الأطراف فإن الطرف
                الثاني يتحمل كافة التكاليف أو الأضرار الناتجة أو المترتبة على السائق لصالحه أو لصالح جميع الأطراف
                المتضررة<span class="en">.</span> كما يلتزم الطرف الثاني بعمل صيانة دورية للمركبات التي يستخدمها السائق
                وفي حال حدوث أي خلل أو
                عطل في المركبات فإن الطرف الثاني يتحمل كافة التكاليف والأضرار الناتجة عن ذلك دون أدنى مسؤولية على السائق
                أو الطرف الأول<span class="en">.</span> <br><br>
                وفي حال ثبوت ارتكاب أي مخالفات مرورية من جانب العمالة، يلتزم الطرف الثاني بإبلاغ كلا من السائق والطرف
                الأول كتابياً بتلك المخالفات خلال مدة أقصاها
                <span class="en">(7)</span>
                أيام من تاريخ وقوع المخالفة<span class="en">،</span>
                وإلا فإنه يسقط حقه في
                المطالبة بالتعويض عن قيمة المخالفة أو أي غرامات أخرى<span class="en">.</span>


            </td>
            <td class="en ltr" style="width: 50%; text-align: left; font-size: 12px; vertical-align: top">
                7. In the case of the worker is driving vehicles of the Second Party, the Second Party shall have all
                the vehicles that the driver drives in the name of the Second Party, and it is covered by a
                comprehensive insurance for all parties. In the event that the insurance is not comprehensive for all
                parties, the Second Party bears all costs or damages that may inflict on the driver for his benefit or
                for the benefit of all the affected parties; The Second Party shall perform periodic maintenance for the
                vehicles that the driver uses, and in case of any malfunctions or breakdowns in the vehicles, the Second
                Party bears all consequential costs and damages without any liability on the driver or the First Party.
                <br>
                the Second Party shall notify the driver and the First Party in writing of any traffic violations
                committed by the labors within a maximum period of (7) seven days from the date of the violation,
                otherwise he will forfeit his right to claim compensation for the value of the violation or any other
                fines.

            </td>
        </tr>

        <tr>
            <td style="width: 50%; text-align: right;  font-size: 12px; vertical-align: top">
                <span class="en">8.</span>
                يلتزم الطرف الثاني في حالة حاجة العمالة للرعاية الطبية مراجعة أقرب مركز طبي معتمد في شبكة المراكز
                الطبية لشركة التأمين المعتمدة لدى الطرف الأول أو معالجة العمالة على حساب الطرف الثاني بدون تحمل الطرف
                الأول أي تكلفة<span class="en">،</span> كما يلتزم الطرف الثاني بإبلاغ الطرف الأول مباشرة في حالة حصول
                إصابات العمل وبحد أقصى
                <span class="en">(</span>
                يوم واحد
                <span class="en">)</span>
                من وقت الإصابة مباشرة حتي يتمكن الطرف الاول من إتخاذ الاجراءات النظامية اللازمة وإلا تحمل
                الطرف الثاني التعويضات اللازمة للعامل وفقا للأنظمة المعمول بها في المملكة العربية السعودية
                <span class="en">.</span>


            </td>
            <td class="en ltr" style="width: 50%; text-align: left; font-size: 12px; vertical-align: top">
                8. If the labors requires medical care, the Second Party shall refer to the nearest accredited medical
                center in the network of medical centers of the insurance company accredited to the first party or to
                treat the labors at the expense of the Second Party without incurring any cost to the First Party, and
                the Second Party shall inform the First Party directly in the event of work injuries with a maximum of
                (one day) from the time of the injury directly So that the first party can take the necessary legal
                measures, otherwise the Second Party will bear the necessary indemnity for the worker in accordance with
                the laws in force in the Kingdom of Saudi Arabia.<br/>
                <br/>
                <br/><br/>
                <br/>

            </td>
        </tr>


        <tr>
            <td style="width: 50%; text-align: center;  font-size: 14px; line-height: 24px;background:#ddd">
                <strong>
                    المدفوعات
                </strong>
            </td>

            <td class="en ltr"
                style="width: 50%; text-align: center;  font-size: 14px;line-height: 24px;background:#ddd"><strong>PAYMENTS</strong>
            </td>
        </tr>
        <tr>
            <td style="width: 50%; text-align: right;  font-size: 12px; vertical-align: top">
                <span class="en">أ‌)</span>
                عند التوقيع على هذا العقد فإن الطرف الثاني وافق على أن يقوم بدفع الرسوم الشهرية عن كل عامل حسب
                الجدول أدناه<span class="en">،</span> بالإضافة إلى دفعة مقدمة تعادل رسوم شهرين عن كل عامل بقيمة إجمالية
                قدرها
                <span class="en">( {{ round($total * 2 , 2) }} )</span>
                ريالاً
                سعودياً كتأمين تسترجع بعد نهاية هذا العقد ولايحق للطرف الثاني المطالبة بخصم أي مستحقات للطرف الاول من
                مبلغ التأمين أو حتي طلب رد أو استراجاع هذا التأمين قبل نهاية العقد لأي سبب من الاسباب
                <span class="en">،</span> وأتفق الطرفان
                علي أنه يتم احتساب قيمة بدل ساعات العمل الإضافية لأكثر من
                <span class="en">(8)</span>
                ثماني ساعات يومياً وكذلك العمل أثناء
                العطلات بما يوازي أجر الساعة مضافاً إليه
                <span class="en">(50%)</span>
                خمسون بالمائة من الأجر الأساسي وفقا لأنظمة العمل في
                المملكة العربية السعودية وذلك عن الشهر الذي يليه حسب جدول ساعات العمل المقدم.يتحمل الطرف الثاني كافة
                المصاريف المتعلقة بنقل العمالة من و إلى مقر سكن عمالة الطرف الأول
                <span class="en">.</span> أو توفير وسيلة تنقل مناسبة

                <span class="en">.</span>


            </td>
            <td class="en ltr" style="width: 50%; text-align: left; font-size: 12px; vertical-align: top">
                a) Upon signing this contract, the Second Party agreed to pay the monthly fees for each worker according
                to the table below, in addition to an advance payment equivalent to two months fees for each worker with
                a total value of ( {{ round($total * 2 , 2) }} ) SR as an insurance to be recovered after the end of this contract The second
                party has no right to demand deduction of any dues to the first party from the amount of the insurance
                or even request to return or recover this insurance before the end of the contract for any reason. and
                the value of the overtime allowance will be calculated for more than eight (8) hours, as well as work
                during the holidays, in a manner equal to the hourly wages plus fifty percent (50%) of the basic wage
                according to the labor laws in the Kingdom of Saudi Arabia for the next month, according to the schedule
                of working hours provided.
                Second Party shall bear all the expenses for mobilizing and demobilizing of employees from and to first
                party. Or provide a suitable way of transportation.


            </td>
        </tr>
        <tr>
            <td style="width: 50%; text-align: right;  font-size: 12px; vertical-align: top">

                <table>
                    <tr>
                        <td style="text-align: center;  font-size: 12px; line-height: 18px">رقم</td>
                        <td style="text-align: center;  font-size: 12px; line-height: 18px">الجنسية</td>
                        <td style="text-align: center;  font-size: 12px; line-height: 18px">عدد العمال</td>
                        <td style="text-align: center;  font-size: 12px; line-height: 18px">التكاليف الشهرية</td>
                        <td style="text-align: center;  font-size: 12px; line-height: 18px">بدل الطعام</td>
                        <td style="text-align: center;  font-size: 12px; line-height: 18px">التكاليف الشهرية</td>
                        <td style="text-align: center;  font-size: 12px; line-height: 18px">مجموع التكاليف</td>
                    </tr>
                    @foreach($fnrco_agreement->fnrcoQuotation->fnrcoQuotationsRequest as $fnrco_request)
                        <tr>
                            <td style="text-align: center;  font-size: 12px; line-height: 18px">{{ $fnrco_request->id }}<br/></td>
                            <td style="text-align: center;  font-size: 12px; line-height: 18px">{{ $fnrco_request->country->translate('ar')->name }}</td>
                            <td style="text-align: center;  font-size: 12px; line-height: 18px">{{ $fnrco_request->quantity }}</td>
                            <td style="text-align: center;  font-size: 12px; line-height: 18px">{{ round($fnrco_request->value_per_employee_month - $fnrco_request->Food_allowance , 2) }}</td>
                            <td style="text-align: center;  font-size: 12px; line-height: 18px">{{ $fnrco_request->Food_allowance }}</td>
                            <td style="text-align: center;  font-size: 12px; line-height: 18px">{{ round($fnrco_request->value_per_employee_month , 2) }}</td>
                            <td style="text-align: center;  font-size: 12px; line-height: 18px">{{ round($fnrco_request->total_value_per_month , 2) }}</td>
                        </tr>
                    @endforeach

                    <tr>
                        <td style="text-align: center;  font-size: 12px; line-height: 18px"><br/></td>
                        <td style="text-align: center;  font-size: 12px; line-height: 18px">المجموع</td>
                        <td style="text-align: center;  font-size: 12px; line-height: 18px" colspan="4">{{ round($total , 2) }}</td>
                        <td style="text-align: center;  font-size: 12px; line-height: 18px"></td>
                    </tr>
                    <tr>
                        <td style="text-align: center;  font-size: 12px; line-height: 18px"></td>
                        <td style="text-align: center;  font-size: 12px; line-height: 18px" colspan="6">الأسعار أعلاه
                            ستكون خاضعه لضريبة القيمة المضافة
                        </td>
                    </tr>
                </table>
                <br/>
                <span class="en">ب‌)</span>

                سيقوم الطرف الثاني بتقديم جدول بساعات العمل الخاصة بكل عامل
                <span class="en">(</span>
                جدول حضور وانصراف
                <span class="en">)</span>
                اخر الشهر ليتم على
                أساسها احتساب الخصومات والوقت الإضافي
                <span class="en">.</span>
                ولايحق للطرف الثاني لأي سبب من الاسباب وبشكل نهائي في حبس أو خصم
                أي مبالغ مالية للطرف الاول تحت أي مسمي دون موافقة كتابية مسبقة من الطرف الاول علي هذا الخصم
                <span class="en">.</span><br/>
                <span class="en">ت‌)</span>
                إذا تأخر الطرف الثاني في دفع أي مبلغ مستحق للطرف الأول في موعده المتفق عليه يتم إشعاره بضرورة السداد
                خلال مدة أقصاها خمسة عشرة يوم و بعد أنقضاء هذه المدة من غير سداد للمبالغ المستحقة يحق للطرف الأول مباشرة
                ودون الرجوع للطرف الثاني اتخاذ ما يلي
                <span class="en">:-</span>

            </td>
            <td class="en ltr" style="width: 50%; text-align: left; font-size: 12px; vertical-align: top">

                <table>

                    <tr>
                        <td class="en ltr" style="text-align: center;  font-size: 12px; line-height: 18px">Sl</td>
                        <td class="en ltr" style="text-align: center;  font-size: 12px; line-height: 18px">Nationality
                        </td>
                        <td class="en ltr" style="text-align: center;  font-size: 12px; line-height: 18px">No. of
                            Labors
                        </td>
                        <td class="en ltr" style="text-align: center;  font-size: 12px; line-height: 18px">Charge per
                            Month
                        </td>
                        <td class="en ltr" style="text-align: center;  font-size: 12px; line-height: 18px">Food
                            allowance
                        </td>
                        <td class="en ltr" style="text-align: center;  font-size: 12px; line-height: 18px">Monthly
                            charges
                        </td>
                        <td class="en ltr" style="text-align: center;  font-size: 12px; line-height: 18px">Total charge
                            by month
                        </td>
                    </tr>
                    @foreach($fnrco_agreement->fnrcoQuotation->fnrcoQuotationsRequest as $fnrco_request)
                        <tr>
                            <td class="en ltr" style="text-align: center;  font-size: 12px; line-height: 18px">{{ $fnrco_request->id }}<br/></td>
                            <td class="en ltr" style="text-align: center;  font-size: 12px; line-height: 18px">{{ $fnrco_request->country->translate('en')->name }}</td>
                            <td class="en ltr" style="text-align: center;  font-size: 12px; line-height: 18px">{{ $fnrco_request->quantity }}</td>
                            <td class="en ltr" style="text-align: center;  font-size: 12px; line-height: 18px">{{ round($fnrco_request->value_per_employee_month - $fnrco_request->Food_allowance , 2) }}</td>
                            <td class="en ltr" style="text-align: center;  font-size: 12px; line-height: 18px">{{ $fnrco_request->Food_allowance }}</td>
                            <td class="en ltr" style="text-align: center;  font-size: 12px; line-height: 18px">{{ round($fnrco_request->value_per_employee_month ,2) }}</td>
                            <td class="en ltr" style="text-align: center;  font-size: 12px; line-height: 18px">{{ round($fnrco_request->total_value_per_month , 2) }}</td>
                        </tr>
                    @endforeach

                    <tr>
                        <td class="en ltr" style="text-align: center;  font-size: 12px; line-height: 18px"><br/></td>
                        <td class="en ltr" style="text-align: center;  font-size: 12px; line-height: 18px">TOTAL</td>
                        <td class="en ltr" style="text-align: center;  font-size: 12px; line-height: 18px"
                            colspan="4">{{ round($total , 2) }}</td>
                        <td class="en ltr" style="text-align: center;  font-size: 12px; line-height: 18px"></td>
                    </tr>
                    <tr>
                        <td class="en ltr" style="text-align: center;  font-size: 12px; line-height: 18px"></td>
                        <td class="en ltr" style="text-align: center;  font-size: 12px; line-height: 18px" colspan="6">
                            The above amount is subject to VAT
                        </td>
                    </tr>


                </table>
                <br/>
                b) The SECOND PARTY is responsible to submit a time sheet at the end of every month to calculate
                deduction and over time based on basic salary. The second party has no right for any reason to deduct
                any amount of money for the first party under any name without the prior written consent of the first
                party.
                <br/>
                c) If the Second Party fails to pay any amount due to the First Party in the agreed time, it will be
                notified of the need to pay within a maximum period of fifteen days. After the end of this period
                without paying the amounts due, the First Party is entitled to take the following actions:
            </td>
        </tr>
        <tr>
            <td style="width: 50%; text-align: right;  font-size: 12px; vertical-align: top">


                <span class="en">1. </span>
                إنهاء العقد بالكامل و سحب جميع العمالة فوراً مع تحمل الطرف الثاني وسداده كامل أتعاب العقد للطرف الأول
                شاملة الأتعاب المتأخرة و أتعاب الفترة المتبقية من العقد<span class="en">.</span> وهذا متفق عليه بين الطرفين ولايحق لأي منهما
                الاعتراض عليه لأي سبب من الاسباب مستقبلاً <span class="en">.</span> <br/>
                <span class="en">2.</span>
                الإستمرار في تنفيذ العقد مع سحب العمالة التي لم يقوم الطرف الثاني بسداد الأتعاب المستحقة عنهم مع
                تحمله وسداده كامل أتعاب العقد للطرف الأول شاملة الأتعاب المتأخرة عن العمالة المسحوبة و أتعاب الفترة
                المتبقية لهم في العقد <span class="en">.</span> <br/>
                <span class="en">3.</span>
                التقدم للجهات المختصة و اتخاذ كافة الإجراءات النظامية التي تحفظ حقه
                <span class="en">.</span>
                وإلزام الطرف الثاني بكافة
                المبالغ المستحقة عليه
                <span class="en">.</span> <br/>
                <span class="en">4.</span>
                و للطرف الأول مطلق الحق في اتخاذ جميع الإجراءات المذكورة في هذه الفقرة أو بعضها
                <span class="en">.</span> حسب مايراه مناسباً
                للحفاظ علي حقوقه المالية والتعاقدية وأيضاً للحفاظ علي حقوق العمالة
                <span class="en">.</span>


            </td>
            <td class="en ltr" style="width: 50%; text-align: left; font-size: 12px; vertical-align: top">


                1- Terminating the contract in full and withdrawing all labor force immediately, while the Second Party
                bears and pays the full contract fees to the First Party, including arrears and fees for the remainder
                of the contract. This is agreed upon between the two parties, and neither of them has the right to
                object to it for any reason in the future.<br/>
                2- Continuing to implement the contract with the withdrawal of employment for which the Second Party has
                not paid the fees due for them, while bearing and paying the full contract fees to the First Party,
                including late fees for withdrawn employment and fees for the remainder of the contract.<br/>
                3- Taking the necessary legal actions through the competent authorities to preserve their rights. And
                oblige the second party to all the due amounts.<br/>
                4- The First Party has the absolute right to take all actions mentioned in this paragraph or some of
                them.


            </td>
        </tr>


        <tr>
            <td style="width: 50%; text-align: center;  font-size: 14px; line-height: 24px;background:#ddd">
                <strong>
                    شروط و أحكام عامة
                </strong>
            </td>

            <td class="en ltr"
                style="width: 50%; text-align: center;  font-size: 14px;line-height: 24px;background:#ddd"><strong>GENERAL
                    TERMS</strong>
            </td>
        </tr>
        <tr>
            <td style="width: 50%; text-align: right;  font-size: 12px; vertical-align: top">


                <span class="en">أ)</span>

                الموظفين و العاملين المطبق عليهم هذا العقد تحت مسئولية و إشراف الطرف الثاني<span class="en">.</span>
                بشكل كامل
                <span class="en">.</span><br/>
                <span class="en"> ب)</span>

                إن رواتب الموظفين وكافة المصروفات المتصلة بها سيتم تطبيقها اعتباراً من تاريخ الإلتحاق بالطرف الثاني
                <span class="en">.</span>
                دون أي تأخير <span class="en">.</span> <br/>
                <span class="en">ت)</span>
                إن أي تعديل لأي من اللوائح و الأنظمة أو أي قوانين ملزمه تصدر بواسطة الهيئات الحكومية أو بواسطة أي
                محكمة تكون مطلوبة التطبيق على الطرف الثاني وفقاً للقوانين دون تغيير في حقوق و أتعاب الطرف الأول <span
                        class="en">.</span> <br/>
                <span class="en">ث)</span>
                للطرف الأول الحق في تعديل أسعار خدمات العمالة موضوع هذه الأتفاقية لمواكبة أي تعديلات تحدث في أي رسوم
                حكومية مثل رسوم الإقامة و الضرائب والتأمين الطبي وتذاكر الطيران و رسوم تأشيرة الخروج و العودة و أي رسوم
                حكومية أخرى و يتم تحصيل الرسوم من الطرف الثاني متى ما بدأت الجهات الرسمية في تحصيلها
                <span class="en">.</span><br/>
                <span class="en">ج)</span>
                عدد ساعات العمل لكافة العمال
                <span class="en">(8)</span>
                ثمانية ساعات في اليوم بمعدل سته أيام في الأسبوع بعدد
                <span class="en">(48)</span>
                ثمانية و
                أربعون ساعه في الأسبوع
                <span class="en">.</span>
                <span class="en">ح)</span>
                أن أي تعديل في ساعات عمل الموظفين إلى أقل من
                <span class="en">(48)</span>
                ثمانية و أربعون ساعه في الأسبوع سيتم تطبيقة وفقاً
                للأنظمة في المملكة العربية السعودية دون التأثير على رسوم الطرف الأول و أتعابه الشهرية <span
                        class="en">.</span> <br/>
                <span class="en">خ)</span>
                غياب الموظفين يخصم من الراتب الأساسي فقط <span class="en">.</span> بعد الرجوع للطرف الاول كتابياً علي
                هذا الخصم <span class="en">.</span>


            </td>
            <td class="en ltr" style="width: 50%; text-align: left; font-size: 12px; vertical-align: top">


                A) The employees and workers to whom this contract is applied is completely under the responsibility and
                supervision of the second party.<br/>
                B) Employees’ salary and all related expenses apply from the date of joining the SECOND PARTY. Without
                any delay.<br/>
                C) Any changes of new laws or a regulation issued by a government agency or court would apply to the
                SECOND PARTY without any change in the rights fee of the FIRST PARTY.<br/>
                D) The FIRST PARTY has the right to change the charges to keep up with any governmental fees variation
                such as iqama fees, taxes, Medical insurance and airline tickets, exit and reentry visa charges and any
                other governmental fees. The fees shall be collected from the SECOND PARTY when the official authorities
                start collecting them.<br/>
                E) All employees shall work 8 hours a day, 6 days a week (48hrs/week).
                F) Any changes in the employee's working hours to less than forty-eight (48) hours per week will be
                applied according to the laws in the Kingdom of Saudi Arabia, without affecting the First Party's
                charges and its monthly fees.<br/>
                G) Absentee of the employees shall only be deducted from the basic salary. After reviewing with the
                first party by written notification regarding this deduction.


            </td>
        </tr>

        <tr>
            <td style="width: 50%; text-align: center;  font-size: 14px; line-height: 24px;background:#ddd">
                <strong>
                    مدة العقد
                </strong>
            </td>

            <td class="en ltr"
                style="width: 50%; text-align: center;  font-size: 14px;line-height: 24px;background:#ddd"><strong>Duration
                    of the contract</strong>
            </td>
        </tr>

        <tr>
            <td style="width: 50%; text-align: right;  font-size: 12px; vertical-align: top">

                مدة هذا العقد
                <span class="en">{{ $fnrco_agreement->fnrcoQuotation->Contract_period }} شهر </span>
                من تاريخ التوقيع عليه و يجدد تلقائياً ما لم يخطر أحد الطرفين الأخر برغبته في عدم
                التجديد قبل إنتهاء العقد بثلاثين يوماً على الأقل <span class="en">.</span> وإلا يعتبر مجدد لمدة مماثلة .
                ويترتب عليه كافة أثارة
                القانونية والمالية<span class="en">.</span>


            </td>
            <td class="en ltr" style="width: 50%; text-align: left; font-size: 12px; vertical-align: top">

                The term of this Agreement shall be {{ $fnrco_agreement->fnrcoQuotation->Contract_period }} Month from the date of signature and shall be automatically
                renewed unless one of the Parties notifies the other of its desire not renew it at least 30 days before
                the end of the Agreement. Otherwise it is renewed for a similar period. And it has all the legal and
                financial implications.


            </td>
        </tr>

        <tr>
            <td style="width: 50%; text-align: center;  font-size: 14px; line-height: 24px;background:#ddd">
                <strong>
                    الإنهاء المبكر للإتفاقية
                </strong>
            </td>

            <td class="en ltr"
                style="width: 50%; text-align: center;  font-size: 14px;line-height: 24px;background:#ddd">
                <strong>PREMATURE TERMINATION OF CONTRACT</strong>
            </td>
        </tr>

        <tr>
            <td style="width: 50%; text-align: right;  font-size: 12px; vertical-align: top">

                مدة هذا العقد

                في حال رغبه الطرف الثاني عدم إستكمال مدة الأتفاقية فيما يخص أي موظف فإنه يتوجب عليه إشعار الطرف الأول
                برغبته في الإنهاء قبل 30 يوماً من التاريخ المراد الإنهاء فيه <span class="en">،</span> كما يلتزم الطرف
                الثاني بدفع ما قيمته
                <span class="en">(15%)</span>
                من المقابل الشهري للعامل لباقي فترة الإتفاقية <span class="en">.</span> هذا البند متفق عليه بين الطرفين
                <span class="en">.</span>


            </td>
            <td class="en ltr" style="width: 50%; text-align: left; font-size: 12px; vertical-align: top">

                If the Second Party wishes not to complete the term of the Agreement with respect to any Employee, it
                shall notify the FIRST PARTY of its desire 30 days prior to the expiry date. The SECOND PARTY shall also
                pay 15% of the employee's monthly salary for the remainder of Agreement. This clause is agreed upon
                between the two parties.


            </td>
        </tr>

        <tr>
            <td style="width: 50%; text-align: center;  font-size: 14px; line-height: 24px;background:#ddd">
                <strong>
                    النزاعات وجهات الأختصاص القضائي
                </strong>
            </td>

            <td class="en ltr"
                style="width: 50%; text-align: center;  font-size: 14px;line-height: 24px;background:#ddd">
                <strong>JURISDICTION LEGAL & DISPUTE</strong>
            </td>
        </tr>

        <tr>
            <td style="width: 50%; text-align: right;  font-size: 12px; vertical-align: top">

                يتم تفسير هذا العقد وفقاً للقوانين و الأنظمة المعمول بها في المملكة العربية السعودية ومحاكمها و أي
                نزاعات أو خلافات قد تنشأ من هذا العقد و التي لا يمكن أن يتم تسويتها بالطرق الودية بين الطرفين يكون
                الأختصاص المكاني بنظرها محاكم مدينة الرياض في المملكة العربية السعودية
                <span class="en">.</span>


            </td>
            <td class="en ltr" style="width: 50%; text-align: left; font-size: 12px; vertical-align: top">

                This contract is interpreted in accordance with the laws and regulations in force in the Kingdom of
                Saudi Arabia and its courts. In the case of disputes or conflicts that may arise from this contract
                between both parties and cannot be settled amicably, the spatial jurisdiction of its adjudication will
                be assigned to the courts of Riyadh in the eastern region of the Kingdom of Saudi Arabia.


            </td>
        </tr>
        <tr>
            <td style="width: 50%; text-align: center;  font-size: 14px; line-height: 24px;background:#ddd">
                <strong>
                    المراسلات
                </strong>
            </td>

            <td class="en ltr"
                style="width: 50%; text-align: center;  font-size: 14px;line-height: 24px;background:#ddd">
                <strong>Correspondence</strong>
            </td>
        </tr>

        <tr>
            <td style="width: 50%; text-align: right;  font-size: 12px; vertical-align: top">

                <span class="en">أ)</span>
                يتم إعتماد معلومات تواصل الطرف الثاني المنصوص عليها في بدايه العقد و تكون جميع مراسلات و تبليغات
                الطرف الأول للطرف الثاني معتمدة بموجبها و تترتب عليها كافةالأثار القانونية
                <span class="en">.</span>
                <br/>
                <span class="en">ب)</span>
                يتم إعتماد عنوان البريد الإلكتروني المنصوص عليه في معلومات الطرف الثاني في بداية هذا العقد لاستقبال و
                استلام جميع الفواتير و إشعارات المطالبة بالسداد الصادرة من الطرف الأول و تعد جميع الفواتير و الإشعارات
                المرسله للطرف الثاني منتجه لأثارها القانونية و تبدأ جميع المدد و الفترات المنصوص عليها في هذا العقد من
                تاريخ إرسال البريد الإلكتروني لبريد الطرف الثاني

                <span class="en">.</span>


            </td>
            <td class="en ltr" style="width: 50%; text-align: left; font-size: 12px; vertical-align: top">
                A) The Second Party’s contact information stipulated at the beginning of the contract is approved and
                all the correspondence and notifications of the First Party to the Second Party are approved accordingly
                and have all legal implications.<br/>
                B) The e-mail address provided in the information of the Second Party is approved at the beginning of
                this contract to receive all bills and notices of payment issued by the First Party, and all bills and
                notices sent to the Second Party are legally effective, and all periods stipulated in this contract
                begin from the date of sending the e-mail to the Second Party's mail.


            </td>
        </tr>

        <tr>
            <td style="width: 50%; text-align: right;  font-size: 12px; vertical-align: top">

                حرر هذا العقد من نسختين أصليتين مكتوبتين بكل من اللغه العربية و اللغه الإنجليزية و استلم كل طرف نسخه
                للعمل بموجبها و في حالة وجود أي تعارض بين النص العربي و الإنجليزي يعتمد النص العربي بما يزيل ذلك التعارض
                <span class="en">.</span><br/>
                ويقر الطرف الثاني بإطلاعه على كامل مواد و بنود العقد وفهمها وعلمها العلم النافي للجهالة والموافقة عليها
                بشكل كامل ولايحق له الاحتجاج علي أي بند أو نص لأي سبب من الاسباب بعد التوقيع علي هذا العقد


                <span class="en">.</span><br/><br/><br/><br/>

                معلومات الاتصال
                <span class="en">:</span><br/><br/>

                الطرف الأول<br/>
                اسم ممثل المشروع <span class="en">:</span><br/>
                رقم التواصل <span class="en">:</span><br/>

                الطرف الثاني<br/><br/>
                اسم ممثل المشروع<span class="en">:</span><br/>
                رقم التواصل <span class="en">:</span><br/>


            </td>
            <td class="en ltr" style="width: 50%; text-align: left; font-size: 12px; vertical-align: top">
                This Agreement has been edited in two original copies written in both Arabic and English, each party has
                received one original copy to act accordingly. In case of discrepancy the Arabic text shall prevail.
                The Second Party confirms that he has viewed all the articles and clauses of the contract, understood
                them thoroughly and carefully and agreed to it completely and he has no right to object to any clause or
                text for any reason after signing this contract.<br/>


                Information Contact:<br/><br/><br/>
                FIRST PARTY<br/><br/>
                Project Representative Name: -<br/>
                Contact No.: ….<br/>

                SECOND PARTY<br/><br/><br/><br/>
                Project Representative Name: …….<br/>
                Contact No.: ….<br/>


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
                <br/>
            </td>
            <td class="en ltr" style="width: 50%; text-align: left; font-size: 12px; vertical-align: middle;line-height: 30px">
                <br/>
                Name: MR/
                <br/>
            </td>
        </tr>
        <tr>
            <td style="width: 50%; text-align: center;  font-size: 12px; vertical-align: top ; direction: rtl">

                (التوقيع والختم)

                <br>   <br>
                <br>   <br> <br>   <br>

                التاریخ....................

            </td>
            <td class="en ltr" style="width: 50%; text-align: center; font-size: 12px; vertical-align: top">
                (Signature and Stamp)

                <br>   <br>
                <br>   <br>  <br>   <br>


                Date:……………………………….


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
            <td class="en ltr" style="width: 50%; text-align: center; font-size: 14px; vertical-align: top; line-height: 18px">
                AUTHORIZED SIGNATORY
                <br/><br/><br/>

                (SECOND PARTY)




            </td>
        </tr>
        <tr>
            <td style="width: 50%; text-align: right;  font-size: 12px; vertical-align: top ; direction: rtl">
                <br/>
                الاسم: السید/
                <br/>
            </td>
            <td class="en ltr" style="width: 50%; text-align: left; font-size: 12px; vertical-align: top">
                <br/>
                Name: MR/
                <br/>
            </td>
        </tr>
        <tr>
            <td style="width: 50%; text-align: center;  font-size: 12px; vertical-align: top ; direction: rtl">

                (التوقيع والختم)

                <br>   <br>
                <br>   <br>  <br>   <br>

                التاریخ....................

            </td>
            <td class="en ltr" style="width: 50%; text-align: center; font-size: 12px; vertical-align: top">
                (Signature and Stamp)

                <br>   <br>
                <br>   <br> <br>   <br>


                Date:……………………………….


            </td>
        </tr>
        </tbody>
    </table>
</main>
</body>
</html>
