from behave import *

use_step_matcher("parse")

@given('A set of campaign types had been imported from Lime')
def step_impl(context):
    from tfmsurveysapp.models import CampaignType
    for row in context.table:
        campaignType = CampaignType()
        for heading in row.headings:
            setattr(campaignType, heading, row[heading])
        campaignType.save()

@given('A set of campaigns had been imported from Lime')
def step_impl(context):
    from tfmsurveysapp.models import Campaign
    for row in context.table:
        campaign = Campaign()
        for heading in row.headings:
            setattr(campaign, heading, row[heading])
        campaign.save()

@when('I list the campaigns')
def step_impl(context):
    context.browser.visit(context.get_url('tfmsurveysapp:campaigns_list'))

@then('I\'m viewing a list of campaigns')
def step_impl(context):
    assert len(context.browser.find_by_css('div#content ul'))
#    raise NotImplementedError('STEP: Then I\'m viewing a list of campaigns')