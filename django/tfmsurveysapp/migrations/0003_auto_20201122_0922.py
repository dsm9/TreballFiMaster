# Generated by Django 2.2.12 on 2020-11-22 09:22

from django.db import migrations, models


class Migration(migrations.Migration):

    dependencies = [
        ('tfmsurveysapp', '0002_auto_20201120_2240'),
    ]

    operations = [
        migrations.AlterField(
            model_name='professor',
            name='surname2',
            field=models.CharField(max_length=50, null=True, verbose_name='Cognom2 professor'),
        ),
    ]
