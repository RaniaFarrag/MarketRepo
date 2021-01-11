<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en" dir="rtl">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>Undertakeing</title>
    <style>
        @page {
            margin: 110px 20px;
            header: page-header;
            footer: page-footer;
        }

        body {
            font-size: 13px;
            letter-spacing: 0px; position: relative;
            text-align: right;
            font-family: 'examplefont', sans-serif;
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
    </style>

</head>


<body dir="rtl">

<htmlpageheader name="page-header">
    <header><img style="width: 100%" src="http://alwatnia.com.sa/demo/linrcopdf/head.jpg"></header>
</htmlpageheader>

<htmlpagefooter name="page-footer">

    <footer><img style="width: 100%" src="http://alwatnia.com.sa/demo/linrcopdf/foot.jpg"></footer>
</htmlpagefooter>
<main>
    <h3 style="text-align: center">تفويض</h3>

    <table style="line-height: 30px; border: none;">

        <tbody>
        <tr>
            <td style="width: 50%; text-align: right;  font-size: 12px;border: none; vertical-align: top;">
                تاريخ
                <span class="en"> :  {{ $linrco_undertaking->date }}</span>
                <br>
                إلى شركة ليناركو للتوظيف
                <br>
                طريق عمر بن عبد العزيز
                <span class="en">   ،</span>
                ص
                <span class="en"> .</span>
                ب
                <span class="en">   ..{{ $linrco_undertaking->linrco_mail_box }}  </span>
                <span class="en"> ،</span>
                الملز<br>
                الرياض، المملكة العربية السعودية


            </td>
            <td class="en ltr"
                style="width: 50%; text-align: left; font-size: 12px; vertical-align: top;border: none;">Date
                {{ $linrco_undertaking->date }} <br>
                To LINRCO Recruitment Company<br>
                Umar Ibn Abdul Aziz Road, PO Box:{{ $linrco_undertaking->linrco_mail_box }}, Al Malaz<br>
                Riyadh, Saudi Arabia<br>
                Gentlemen :


            </td>
        </tr>
        <tr>
            <td style="width: 50%; text-align: center;  font-size: 12px;border: none; vertical-align: top; text-decoration: underline">
                الي من يهمه الامر

            </td>
            <td class="en ltr"
                style="width: 50%; text-align: center; font-size: 12px; vertical-align: top;border: none; text-decoration: underline">
                To whom it may Concern


            </td>
        </tr>
        <tr>
            <td style="width: 50%; text-align: right;  font-size: 12px;border: none; vertical-align: top; ">
                فإننا نحن شركة  {{ $linrco_undertaking->company->translate('ar')->name }}
                <span class="en"> ،</span>
                سجل تجاري رقم
                <span class="en"> {{ $linrco_undertaking->company_cr }}</span>
                نؤكد بأن شركة ليناركو للتوظيف التي تحمل
                رقم السجل التجاري رقم
                <span class="en"> {{ $linrco_undertaking->linrco_cr }}</span>
                <span class="en">  ،</span>
                ونظراً لأننا نملك سجل تجاري في المجالات التالية
                <span class="en">:</span>
            </td>
            <td class="en ltr"
                style="width: 50%; text-align: left; font-size: 12px; vertical-align: top;border: none; ">
                We ({{ $linrco_undertaking->company->translate('en')->name }} ) <br>
                holding commercial Registration NO: {{ $linrco_undertaking->company_cr }} confirms LINRCO Recruitment Company , holding
                commercial Registration No. {{ $linrco_undertaking->linrco_cr }} ,and we are holding commercial Registration No. in the fields
                of:


            </td>
        </tr>
        <tr>
            <td style="width: 50%; text-align: right;  font-size: 12px;border: none; vertical-align: top; ">
                <span class="en"> •</span>
                انشطة الصديليات
                <span class="en"> ،</span>
                عيادات الامراض الجلدية والتناسلية
                <span class="en"> ،</span>
                والعيادات الطبية لجراحات التجميل
                <span class="en"> ،</span><br/>
                <span class="en"> •</span>
                مراكز التحاليل الطبية
                <span class="en"> ،</span>
                دور الرعاية التمريضية الأخرى

            </td>
            <td class="en ltr"
                style="width: 50%; text-align: left; font-size: 12px; vertical-align: top;border: none; ">
                • Pharmacies activities, dermatologists, medical clinics for plastic surgery,<br/>
                • Medical analysis centers and other nursing homes
            </td>
        </tr>
        <tr>
            <td style="width: 50%; text-align: right;  font-size: 12px;border: none; vertical-align: top; ">
                فإنه بموجب هذا الخطاب المعتمد والموقع
                <span class="en"> ،</span>
                فإننا نفوض شركة ليناركو المتخصصة في مجال توظيف الكوادر
                <span class="en"> ،</span>
                في
                تمثيلنا في مجال توظيف وتفويض مكاتب الاستقدام الخارجية عن طريق شركات الاستقدام الاهلية في المملكة
                العربية السعودية في كل مايخص المرشحين الذين تم طلبهم من جهتنا
                <span class="en"> ،</span>
                وكذلك توقيع عقود العمل مع هؤلاء
                المرشحين
                <span class="en"> .</span>


            </td>
            <td class="en ltr"
                style="width: 50%; text-align: left; font-size: 12px; vertical-align: top;border: none; ">
                According to this approved and signed letter, we authorize the LINRCO company specialized in the field of recruiting candidates, to represent us in the field of recruitment and delegation of international outsourced recruitment offices through recruitment companies in Saudi Arabia for everything related to the candidates who were requested by us, as well as signing employment contracts with these candidates.
            </td>
        </tr>
        <tr>
            <td style="width: 50%; text-align: right;  font-size: 12px;border: none; vertical-align: top; ">
                شركة روضة الأقصى الطبية
                <span class="en"> ،</span>
                عنها<span class="en">:</span> موسى بن محمد بن ذعار دحمان
                <span class="en"> ،</span>
                توقيع
                <span class="en">.........................</span>



            </td>
            <td class="en ltr"
                style="width: 50%; text-align: left; font-size: 12px; vertical-align: top;border: none; ">
                Rawdat Al-Aqsa Medical Company :  Musa bin Muhammad bin Dhaar Dahman  , signature ………………
            </td>
        </tr>
        <tr>
            <td style="width: 50%; text-align: right;  font-size: 12px;border: none; vertical-align: top; ">
                شركة ليناركو للتوظيف
                <span class="en">،</span>
                عنها  عايض تركي ال فطيح
                <br/>
                توقيع

                <span class="en">.........................</span>



            </td>
            <td class="en ltr"
                style="width: 50%; text-align: left; font-size: 12px; vertical-align: top;border: none; ">
                LINRCO Recruitment Company ,    Ayed Turky AL feteeh
                <br/>
                Signature …………..

            </td>
        </tr>


        </tbody>
    </table>


</main>
</body>
</html>
