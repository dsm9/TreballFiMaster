# Generated by Django 2.2.12 on 2021-06-18 15:18

from django.db import migrations, models


class Migration(migrations.Migration):

    dependencies = [
        ('tfmsurveysapp', '0013_auto_20210506_1856'),
    ]

    operations = [
        migrations.AddField(
            model_name='campaign',
            name='estat',
            field=models.CharField(max_length=50, null=True, verbose_name='Estat'),
        ),
        migrations.AddField(
            model_name='campaign',
            name='subestat',
            field=models.CharField(max_length=50, null=True, verbose_name='Subestat'),
        ),
    ]
