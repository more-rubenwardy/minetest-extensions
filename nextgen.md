Functions
=========




Database
========

mod
{
	// IDS
	mID // mod id
	uID  //user id

	// NAMES
	name // name
	basename // is the name of the folder for mods

	// OVERVIEW AND PHP VERSION SPECIFIC
	overview // one line description no formating (for mod managers)
	description // text description article bbcode
	tags // tags for searching (should I make a separate table???)
	progress // for a progress bar

	// LICENSE
	license // License text (ie "Code: CC-BY-SA, Images: WTFPL") - specific information
	lID // license id (ie: "CC-BY-SA") - the highest level of licene

	// DOWNLOAD
	repo_type  // archive or git
	file // download / repo link
	_likes
}

recommend
{
	mID
	nID
}

vote(
	id,
	uID,
	mID,
	liked
)

review
{
	id, // review id
	mID, // mod id
	uID,  // user id
	overview, // one line description no formating (for display in lists)
	description // text description article bbcode
}

user
{
	uID, // user id
	name, // username
	_mods, // number of mods
}