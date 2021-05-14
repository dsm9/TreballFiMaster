# Generated by Django 2.2.12 on 2021-04-28 17:29

from django.db import migrations, models


class Migration(migrations.Migration):

    dependencies = [
        ('tfmsurveysapp', '0010_auto_20210326_1753'),
    ]

    operations = [
        migrations.DeleteModel(
            name='TipoCampania',
        ),
        migrations.RenameField(
            model_name='professor',
            old_name='num_prof_lime',
            new_name='pid_lime',
        ),
        migrations.AddField(
            model_name='comment',
            name='language',
            field=models.CharField(max_length=2, null=True, verbose_name='Idioma'),
        ),
        migrations.AlterField(
            model_name='comment',
            name='question_id_lime',
            field=models.CharField(max_length=10, null=True, verbose_name='Cod pregunta Lime'),
        ),
    ]
